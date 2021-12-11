<?php

namespace App\Http\Requests\Club;

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
            'logo' => ['required', 'image'],
            'name' => ['required', 'string', 'unique:clubs'],
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
