<?php

namespace App\Http\Requests\ScanFile;

use Illuminate\Foundation\Http\FormRequest;

class EditScanFileRequest extends FormRequest
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
            'scan_id'       => 'required',
            'file_name.*'     => 'required',
        ];
    }
}