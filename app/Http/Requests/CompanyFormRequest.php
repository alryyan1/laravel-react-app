<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyFormRequest extends FormRequest
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
            'name'=>'string|required',
            'email'=>'',
            'lab_endurance'=>'numeric|required',
            'service_endurance'=>'numeric|required',
            'lab_roof'=>'numeric|required',
            'service_roof'=>'numeric|required',
            'phone'=>'required',
        ];
    }
}
