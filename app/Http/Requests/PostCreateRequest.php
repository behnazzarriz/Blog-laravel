<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PostCreateRequest extends FormRequest
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
    protected  function prepareForValidation()
    {
        if($this->input('slug')){
            $this->merge(['slug'=>Str::slug($this->input('slug'))]);
        }
        else{
            $this->merge(['slug'=>Str::slug($this->input('title'))]);
        }
    }
    public function rules()
    {
        return [
            'title'=>'required|min:10',
            'description'=>'required',
            'first_photo'=>'required',
            'categories'=>'required',
            'status'=>'required',
            'slug'=>'unique:posts',
            'meta_description'=>'required',
            'meta_keywords'=>'required',

        ];
    }

    public function messages()
    {
       return[
           'title.required'=>'please enter title of post ...!',
           'title.min'=>'title of post should be min :10 characters',
           'description.required'=>'please enter description of post ...!',
           'photo.required'=>'please choose photo of post ...!',
           'categories.required'=>'please choose category of post ...!',
           'status.required'=>'please choose status of post ...!',
           'slug.unique'=>'this name is exist...',
           'meta_description.required'=>'please enter meta_description of post ...!',
           'meta_keywords.required'=>'please enter meta_keywords of post ...!',

       ];
    }
}
