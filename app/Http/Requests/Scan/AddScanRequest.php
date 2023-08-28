<?php

namespace App\Http\Requests\Scan;

use Illuminate\Foundation\Http\FormRequest;

class AddScanRequest extends FormRequest
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
            'patient_id'                         => 'required|exists:patients,id',
            'scan_type_id'                       => 'required|exists:scan_types,id',
            'dentist_id'                         => 'required|exists:dentists,id',
            'technician_id'                      => 'required|exists:technicians,id',
            'total_price_after_discount'         => 'required',
            'paid_by_patient'                    => 'required',
            'discount_reason'                    => 'nullable',
        ];
    }
}
