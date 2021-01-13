<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PdfValidator implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function passes($attribute, $value)
    {
        return $value->extension()=='pdf';
    }


    public function message()
    {
        return 'The file must be in pdf format.';
    }
}
