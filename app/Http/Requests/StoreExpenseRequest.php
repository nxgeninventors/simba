<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenseRequest extends FormRequest
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
            'expense_status_id' => 'required|exists:expense_statuses,id',
            'notes' => 'nullable',
            'user_id' => 'required|exists:users,id',
            'approved_by' => 'required|exists:users,id',
            'approver_notes' => 'nullable',
            'approved_at' => 'nullable|date',
            'amount' => 'required|numeric',
        ];
    }
}
