<?php

namespace App\Rules;

use InvalidArgumentException;
use TypeError;
use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Contracts\Validation\Rule;

class GreatThenAva implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(
        protected string $property,
        protected float $sum = 100
    ) {
        if ($this->sum < 0) {
            throw new InvalidArgumentException('The $sum must be a value greater than 0.');
        }
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
        $array = collect($value);

        try {
            if ($array->sum($this->property) != $this->sum) {
                $fail(__('The sum of the :property must add up to :sum.', [
                    'property' => $this->property,
                    'sum' => $this->sum
                ]));
            }
        } catch (TypeError $error) {
            $fail(__('The values for :property could not be added.', [
                'property' => $this->property
            ]));
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
