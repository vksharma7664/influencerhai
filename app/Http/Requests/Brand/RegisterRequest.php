<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required',
            'designation' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'mobile'=> 'required|digits:10',
            'company_name'=> 'required',
            'company_url'=> 'required',
            'industry'=> 'required',
            'password' => 'required|confirmed|min:6',
        ];
    }
}
