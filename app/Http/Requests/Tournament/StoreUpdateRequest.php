<?php

namespace App\Http\Requests\Tournament;

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
            'is_public' => ['required', 'in:on,close'],
            'club_name' => ['required', 'string'],
            'remarks' => ['nullable', 'string'],
            'legs' => ['required', 'integer'],
            'birds_count' => ['required', 'integer']
        ];
    }
}
