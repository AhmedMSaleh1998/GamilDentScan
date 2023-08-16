<?php

namespace App\Http\Requests\ScanType;

use Illuminate\Foundation\Http\FormRequest;

class AddScanTypeRequest extends FormRequest
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
            'name'                   => 'required',
            'price'                  => 'required',
            'receptionist_commision' => 'required',
            'technicain_commision'   => 'required',
            'base_recieving_time'    => 'required',
        ];
    }
}
