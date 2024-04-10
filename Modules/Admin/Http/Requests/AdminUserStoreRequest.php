<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class AdminUserStoreRequest extends FormRequest
{
    public function rules(Request $request)
    {
        return [
            'name' => 'required',
            'role_id' => 'required',
            'email' => 'required|email:rfc,dns|unique:admin_users,email,'.$request->id.',id,deleted_at,NULL',
            'password' => 'required|required_with:password_confirmation|same:password_confirmation|min:6',
            'password_confirmation' => 'required|required_with:password|min:6',
            'status' => 'required',
        ];
        
    }
    public function authorize()
    {
        return true;
    }
}
