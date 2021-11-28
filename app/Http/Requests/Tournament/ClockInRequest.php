<?php

namespace App\Http\Requests\Tournament;

use App\Rules\IsQrCodeNotUsed;
use Illuminate\Foundation\Http\FormRequest;

class ClockInRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'qr_code' => ['required', 'string', 'exists:qr_code_generators,value', new IsQrCodeNotUsed()]
        ];
    }
}
