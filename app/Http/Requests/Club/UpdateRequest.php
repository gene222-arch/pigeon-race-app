<?php

namespace App\Http\Requests\Club;

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
            'id' => ['required', 'integer', 'exists:clubs'],
            'logo' => ['nullable', 'image'],
            'name' => ['required', 'string', 'unique:clubs,name,' . $this->id],
            'current_balance' => ['required', 'numeric'],
            'entry_fee_reversal' => ['required', 'string', 'in:Yes,No'],
            'club_coordinates' => ['required', 'string'],
            'player_coordinates' => ['required', 'string'],
            'address' => ['required', 'string'],
            'country' => ['required', 'string'],
            'status' => ['required', 'string', 'in:Active,Inactive'],
            'user_ids.*' => ['required', 'distinct', 'integer', 'exists:users,id']
        ];
    }
}
