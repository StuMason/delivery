<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StartsWith implements Rule
{
    public $starts;

    public function __construct($starts)
    {
        $this->starts = $starts;
        dd($this->starts);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return starts_with($value, $this->starts);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The postcode must start with '.$this->starts;
    }
}
