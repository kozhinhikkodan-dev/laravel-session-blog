<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogPostRequest extends FormRequest
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
            'title' => 'required|unique:blogs|regex:/^[a-zA-Z\s\.]+$/',
            'description' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => [
                    Rule::exists('categories', 'id'),
                    // function ($attribute, $value, $fail) {
                    //     if ($value) {
                    //       $categoryName = Category::find($value)->name;
                    //       if ($categoryName === 'Laravel') {
                    //         $fail('Laravel is not a supporting now.');
                    //       }  
                    //     }
                    // }
                ],
            'meta_title' => 'required',
            'meta_description' => 'required',
            ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Blog Title is mandatory for creating blog post',
            'title.unique' => 'Blog Title is already taken, try creating unique title',
        ];
    }

    public function attributes()
    {
        return [
            'description' => 'Blog description'
        ];
    }
}
