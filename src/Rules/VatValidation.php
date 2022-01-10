<?php

namespace  Spyrmp\GreekVatNumberValidator\Rules;

use Illuminate\Contracts\Validation\Rule;

class VatValidation implements Rule
{


    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $value = (string)$value;
        if (!preg_match("/^\d{9}$/i", $value) || $value == "000000000") {
            return false;
        }

        $multiplier = 1;
        $sum = 0;

        for ($i = 7; $i >= 0; $i--) {
            $multiplier *= 2;
            $sum += $value[$i] * $multiplier;
        }

        return $sum % 11 % 10 == $value[8];


    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __("greek-vat-number-validator::greek-vat-number-validator.vat_number");//'The :attribute is not a valid VAT.';

    }
}
