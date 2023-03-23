<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'project_name' => 'required|unique:projects,project_name,'.$this->route('project')->id,
            'project_category_id' => 'required|exists:project_categories,id',
            'project_status_id' => 'required|exists:project_statuses,id',
            'client_id' => 'required|exists:clients,id',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
