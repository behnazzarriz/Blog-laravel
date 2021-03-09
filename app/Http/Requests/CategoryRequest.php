<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
           'title'=>'required',
            'slug'=>Rule::unique('categories')->ignore(request()->category),
            'meta_description'=>'required',
            'meta_keywords'=>'required',
        ];
    }

    public function messages()
    {
       return[
           'title.required'=>'please enter title of category ...!',
           'slug.unique'=>'this name of slug is exist...',
           'meta_description.required'=>'please enter meta_description of category ...!',
           'meta_keywords.required'=>'please enter meta_keywords of category ...!',



       ];
    }
}
