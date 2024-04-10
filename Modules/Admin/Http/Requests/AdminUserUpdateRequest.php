<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class AdminUserUpdateRequest extends FormRequest
{
    public function rules(Request $request)
    {
        return [
            'name' => 'required',
            'role_id' => 'required',
            'email' => 'required|email:rfc,dns|unique:admin_users,email,'.$request->id.',id,deleted_at,NULL',
            'password' => ['nullable', 'regex:/^[^\s]+(\s*[^\s]+)*$/', 'min:6', 'confirmed'],
            'password_confirmation' => ['nullable', 'required_with:password', 'min:6'],
            'status' => 'required',
        ];

    }
    public function authorize()
    {
        return true;
    }
}
