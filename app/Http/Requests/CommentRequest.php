<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'comment'=>'required|min:3'
        ];
    }

    public function messages(){
        return[
            'comment.required'=>'Please Enter the Comment',
            'comment.min'=>'Comment Must be at least 3 Character Long'
        ];
    }
}
