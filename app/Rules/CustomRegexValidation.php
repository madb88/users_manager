<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CustomRegexValidation implements Rule
{


    public $attribute;
    public $description;
    public $regex;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $regex, string $description)
    {
        $this->regex = $regex;
        $this->description = $description;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->attribute = $attribute;

        return preg_match($this->regex, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans(
                'validation.custom.password', [
                    'attribute' => $this->attribute,
                    'format' => $this->description
                ]);
    }
}
