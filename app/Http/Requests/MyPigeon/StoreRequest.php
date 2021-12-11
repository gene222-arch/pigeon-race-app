<?php

namespace App\Http\Requests\MyPigeon;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'ring_band' => ['required', 'string', 'unique:my_pigeons'],
            'image_path' => ['nullable', 'image'],
            'gender' => ['required', 'string', 'in:Cock,Hen'],
            'color' => ['required', 'string'],
            'remarks' => ['nullable', 'string'],
            'bloodline' => ['nullable', 'string'],
            'image' => ['required', 'image']
        ];
    }
}
