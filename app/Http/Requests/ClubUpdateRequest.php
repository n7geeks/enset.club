<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClubUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:255', Rule::unique('clubs')->ignore($this->club)],
            'slogan' => ['nullable', 'max:255'],
            'description' => ['required'],
            'logo' => ['nullable', 'image', 'max:500'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone_number' => ['nullable', 'max:255'],
            'president_id' => ['required', 'exists:users,id'],
            'domain' => ['required', 'max:255', Rule::unique('clubs')->ignore($this->club), 'alpha_dash'],
        ];
    }
}
