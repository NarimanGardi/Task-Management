<?php

namespace App\Http\Requests\Backend\Role;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequest extends FormRequest
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
            'name' => 'required|max:40|unique:roles',
            'permissions' => 'required|array|min:1',
            'permissions.*' => 'required|string|exists:permissions,name',
        ];
        
    }
}
