<?php

namespace App\Http\Requests\Dentist;

use Illuminate\Foundation\Http\FormRequest;

class AddDentistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'              => 'required',
            'address_one'       => 'nullable',
            'address_two'       => 'nullable',
            'phone_one'         => 'nullable',
            'phone_two'         => 'nullable',
            'email_one'         => 'nullable',
            'email_two'         => 'nullable',
            'district_id'       => 'nullable',
        ];
    }
}
