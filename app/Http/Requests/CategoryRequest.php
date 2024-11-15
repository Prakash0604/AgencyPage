<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'title'=>['required',Rule::unique('categories')->ignore($this->route('id'))],
            'status'=>$this->route('id') ? 'nullable' :'required',
        ];
    }

    public function messages(){
        return [
            'title.required'=>'Please Enter the title',
            'title.unique'=>'Title Already Taken'
        ];
    }
}
