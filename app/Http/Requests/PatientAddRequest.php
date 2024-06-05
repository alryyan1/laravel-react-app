<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientAddRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'phone' => 'numeric',
            'age_day' => '',
            'age_month' => '',
            'gender' => '',
            'company_id' => 'numeric',
            'subcompany_id' => 'numeric',
            'company_relation_id' => 'numeric',
            'age_year' => 'numeric',
            'guarantor' => '',
            'insurance_no'=>''
        ];
    }
}
