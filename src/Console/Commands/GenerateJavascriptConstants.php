<?php

namespace Organi\Helpers\Console\Commands;

use Illuminate\Console\Command;

class GenerateJavascriptConstants extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'helpers:generate-javascript-constants {path?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a javascript module which exports constants for all your php constants defined in config/helpers.php';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $basepath = $this->argument('path') ?? 'resources/js/constants/';
        $basepath = base_path($basepath);

        $constants = config('helpers.js_constants', []);

        if (! file_exists($basepath)) {
            mkdir($basepath, 0755, true);
        }

        foreach ($constants as $constant) {
            $name = explode('\\', $constant);
            $name = array_pop($name);

            $out = '';
            foreach ($constant::all() as $key => $value) {
                if (is_string($value)) {
                    $value = "'{$value}'";
                }
                $out .= "export const {$key} = {$value};\n\n";
            }

            $keys = $constant::all()->keys();

            $out .= $this->generateDescriptionFunction($constant);

            $out .= 'export default { ' . $keys->implode(', ') . ', description };';



            $filename = "{$basepath}{$name}.js";

            $file = fopen($filename, 'w');
            fwrite($file, $out);
            fclose($file);

            $this->info("Wrote {$name} to {$filename}");
        }

        return 0;
    }

    private function generateDescriptionFunction($constant): string
    {
        $out = "function description ( type ) {\n";

        foreach ($constant::all() as $name => $value) {
            $description = $constant::description($value);

            if (is_null($description)) {
                continue;
            }

            $out .= "\tif ( type === $name ) {\n";
            $out .= "\t\treturn {\n";

            foreach ($description->translations() as $locale => $value) {
                $out .= "\t\t\t$locale: '$value',\n";
            }

            $out .= "\t\t}\n";
            $out .= "\t}\n\n";
        }

        $out .= "}\n";

        return $out;
    }
}
