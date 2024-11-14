<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AuthRequest extends FormRequest
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
            'full_name'=>$this->route('login') ? 'nullable':'required','min:3',
            'email'=>['required','email',$this->route('register') ? Rule::unique('users')->ignore($this->route('id')): 'nullable'],
            'password'=>$this->route('register') ? Password::min(6)->numbers()->mixedCase()->symbols() :'required',
        ];
    }

    public function messages(){
        return [
            'full_name.required'=>'Please Enter your Full Name',
            'full_name.min'=>'Full Name must be at least 3 digits',
            'email.required'=>'Please Enter your Email',
            'email.email'=>'Please Enter valid Email',
            'password.required'=>'Please Enter your Password',
            'password.min'=>'Please Enter minimum 6 digits Character',
            'password.number'=>'Password Must contain at least one number',
            'password.mixedCase'=>'Password must be of Mixed Case : upper and lower Case',
            'password.symbols'=>'Password must contain at least one symbol'
        ];
    }
}
