<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'title'=>'required|min:3',
            'logo'=>'mimes:png,jpg,webp,jpeg',
            'description'=>'nullable|string',
            'work_description'=>'nullable|string',
            'contact'=>'nullable|numeric|min:7',
            'email'=>'nullable|email',
            'address'=>'nullable|string',
            'facebook_url'=>'nullable|url',
            'github_url'=>'nullable|url',
            'twitter_url'=>'nullable|url',
            'instagram_url'=>'nullable|url',
            'starting_time'=>'nullable|date_format:H:i',
            'ending_time'=>'nullable|date_format:H:i',
            'days'=>'nullable|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday|array',
            'about_us_description'=>'nullable|string',
            'footer_description'=>'nullable|string|max:255'
        ];
    }


    public function messages(){
        return [
            'title.required'=>'Please Enter the Title',
            'title.min'=>'Title must be at least of 3 character',
            'logo.required'=>'Please Choose the image',
            'logo.mimes'=>'Logo Must be of PNG,JPG,WEBP,JPEG',
            'contact.numeric'=>'Contact number must be a type of number',
            'contact.min'=>'Contact Number Must be at least 7 digits',
            'email.email'=>'Invalid Email Format',
        ];
    }
}
