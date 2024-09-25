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
            'name' => 'string',
            'phone' => 'numeric',
             'doctor_id'=>'',
            'age_day' => '',
            'age_month' => '',
            'gender' => '',
            'company_id' => 'numeric',
            'subcompany_id' => 'numeric',
            'company_relation_id' => 'numeric',
            'age_year' => 'numeric',
            'guarantor' => '',
            'insurance_no'=>'',
            'bp'=>'',
            'temp'=>'',
            'heart_rate'=>'',
            'spo2'=>'',
            'height'=>'',
            'weight'=>'',
            'juandice'=>'',
            'pallor'=>'',
            'clubbing'=>'',
            'cyanosis'=>'',
            'edema_feet'=>'',
            'dehydration'=>'',
            'lymphadenopathy'=>'',
            'peripheral_pulses'=>'',
            'feet_ulcer'=>'',
            'present_complains'=>'',
            'history_of_present_illness'=>'',
            'prescription_notes'=>'',
            'provisional_diagnosis'=>'',
            'gov_id'=>'',
            'address'=>'',
            'country_id'=>'',
            'drug_history'=>'',
            'family_history'=>'',
            'rbs'=>'',
            'doctor_finish'=>'',
            'result_auth'=>'',
            'discount'=>'',

        ];
    }
}
