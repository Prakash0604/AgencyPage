<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'post_title' => 'required|min:3',
            // 'post_images' => $this->route('id') ? 'nullable|mimes:png,jpeg,jpg,webp'  : 'required|mimes:png,jpeg,jpg,webp',
            'post_images' => $this->route('id') ? 'array'  : 'required|array',
            'post_images.*' => 'mimes:png,jpeg,jpg,webp|max:2048',
            'post_description' => 'required',
            'post_category_id' => 'required|in:' . implode(',', $this->getOptions()),
        ];
    }

    public function messages(){
        return[
            'post_title.required'=>'Please Enter the Title',
            'post_title.min'=>'Title should be at least 3 character',
            'post_images.required'=>'Please Insert the Image',
            'post_images.*.mimes'=>'Image should be of : png,jpeg,jpg,webp',
            'post_description.required'=>'Please Enter the description',
            'post_category_id.required'=>'Please Select the Category',
            'post_category_id.in'=>'Please Select from the given options only'
        ];
    }

    private function getOptions()
    {
        $options = DB::table('categories')->pluck( 'id');
        return $options->toArray();
    }
}
