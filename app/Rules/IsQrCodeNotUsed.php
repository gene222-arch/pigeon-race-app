<?php

namespace App\Rules;

use App\Models\QrCodeGenerator;
use Illuminate\Contracts\Validation\Rule;

class IsQrCodeNotUsed implements Rule
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

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $qrCode = QrCodeGenerator::query()
            ->firstWhere('value', '=', $value);

        if (is_null($qrCode)) return false;

        return !$qrCode->is_used;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'qr code is invalid';
    }
}
