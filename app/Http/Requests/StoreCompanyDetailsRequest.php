<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyDetailsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'company_name' => 'required',
            'address' => 'required',
            'gst_no' => 'required|regex:/^[A-Z0-9]+$/',
            'bank_name' => 'required',
            'account_no' => 'required|numeric',
            'ifsc_code' => 'required|regex:/^[A-Z0-9]+$/',
            'contact_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ];
    }
}
