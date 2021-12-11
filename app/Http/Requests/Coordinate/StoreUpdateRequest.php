<?php

namespace App\Http\Requests\Coordinate;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'coordinate' => ['required', 'string'],
            'distance_in_km' => ['required', 'numeric', 'min:1']
        ];
    }
}
