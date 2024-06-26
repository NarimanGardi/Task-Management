<?php

namespace App\Http\Requests\Backend\Task;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
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
            'name' => 'required|string|max:190',
            'description' => 'nullable|string',
            'priority' => 'required|string',
            'start_date' => 'required|date|after_or_equal:today',
            'due_date' => 'required|date|after_or_equal:start_date',
            'project_id' => 'required|exists:projects,id',
            'users' => 'nullable|array',
            'users.*' => 'exists:users,id',
            'groups' => 'nullable|array',
            'groups.*' => 'exists:groups,id',
        ];
    }
}
