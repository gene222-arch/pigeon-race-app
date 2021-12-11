<?php

namespace App\Http\Requests\MyPigeon;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'id' => ['required', 'integer', 'exists:my_pigeons'],
            'ring_band' => ['required', 'string', 'unique:my_pigeons,ring_band,' . $this->id],
            'gender' => ['required', 'string', 'in:Cock,Hen'],
            'color' => ['required', 'string'],
            'remarks' => ['nullable', 'string'],
            'bloodline' => ['nullable', 'string'],
            'image' => ['nullable', 'image']
        ];
    }
}
