<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CorporateCardApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        // return $this->user()->hasPermissionTo('create-credit-card-application');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // return [
        //     'applicant_name' => ['required', 'max:150'],
        //     'position' => ['required', 'max:150'],
        //     'phone_work' => ['required', 'max:150'],
        //     'phone_work_mobile' => ['required', 'max:150'],
        //     'manager' => ['required', 'max:150'],
        //     'property_n_procurement_manager' => ['required', 'max:150'],
        //     'justification' => ['required', 'max:50'],
        //     'licence' => ['file'],
        // ];

        return [
            'applicant_name' => [ 'max:150', 'required'],
            'position' => ['max:150'],
            'phone_work' => [ 'max:150'],
            'phone_work_mobile' => [ 'max:150'],
            'manager_id' => ['max:150', 'required'],
            'property_n_procurement_manager_id' => ['max:150', 'required'],
            'justification' => ['max:50'],
        ];
    }


    public function messages(): array
{
    return [
        'manager_id.required' => 'Please select a Manager',
        'property_n_procurement_manager_id.required' => 'Please select a Procurement Manager',
    ];
}
}
