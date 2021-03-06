<?php

namespace Organi\Helpers\Rules;

use Illuminate\Contracts\Validation\Rule;
use Organi\Helpers\Constants\Constant as OrganiConstant;
use RuntimeException;

class Constant implements Rule
{
    protected string $class;

    /**
     * Create a new rule instance.
     */
    public function __construct(string $class)
    {
        if (! is_subclass_of($class, OrganiConstant::class)) {
            throw new RuntimeException('Class is not a constant. Make sure it inherits from Organi\Helpers\Constants\Constant');
        }

        $this->class = $class;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $values = $this->class::all()->toArray();

        return in_array($value, $values);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid constant value. Possible values are: ' . $this->class::all()->implode(', ');
    }

    /**
     * Return description for every constant in this class.
     */
    public static function descriptions(): array
    {
        return [];
    }
}
