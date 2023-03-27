<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpenseRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'notes' => 'nullable',
            'expense_category_id' => 'required|exists:expense_categories,id',
            'project_id' => 'exists:projects,id',
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric',
        ];
    }
}
