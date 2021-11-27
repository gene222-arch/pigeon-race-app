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
            'club_id' => ['required', 'exists:clubs,id'],
            'type' => ['required', 'string', 'in:North Race,South Race,Summer Race'],
            'remarks' => ['nullable', 'string'],
            'legs' => ['required', 'integer'],
            'player_ids.*' => ['required', 'integer', 'exists:users,id'],
            'birds_count' => ['required', 'integer']
        ];
    }

    public function messages()
    {
        return [
            'club_id.exists' => 'Please select a valid club'
        ];
    }
}
