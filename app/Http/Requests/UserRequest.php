<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'email'=>'required|email',
            'roles'=>'required',
            'status'=>'required',
            'password'=>'required|min:6'
        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'Pleas enter Name an Family ...!',
            'email.required'=>'Pleas enter email ...!',
            'email.email'=>'Your email is not valid ...!',
            'roles.required'=>'Pleas enter roles of user ...!',
            'status.required'=>'Pleas enter status of register this user...!',
            'password.required'=>'Pleas enter password ...!',
            'password.min'=>'Password must be at least 6 characters...!'


        ];
    }
}
