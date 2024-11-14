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
            'post_image' => 'required|mimes:png,jpg,jpeg',
            'post_description' => 'required',
            'post_category_id' => 'required|in:' . implode(',', $this->getOptions()),
        ];
    }

    public function messages(){
        return[
            'title.required'=>'Please Enter the Title',
            'title.min'=>'Title should be at least 3 character',
            'image.required'=>'Please Insert the Image',
            'image.mimes'=>'Image should be of : png,jpeg,jpg',
            'description.required'=>'Please Enter the description',
            'category_id.required'=>'Please Select the Category',
            'category_id.in'=>'Please Select from the given options only'
        ];
    }

    private function getOptions()
    {
        $options = DB::table('categories')->pluck( 'id');
        return $options->toArray();
    }
}
