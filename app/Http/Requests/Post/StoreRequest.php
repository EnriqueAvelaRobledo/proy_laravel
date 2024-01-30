<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

     protected function prepareForValidation(){

        $this->merge([
         ///   'slug' => Str::slug($this->title),
           // 'slug' => Str::of($this->title)->slug()->append("-adicional"),
            'slug' =>Str($this->title)->slug()
        ]);
     }

     static public function myRules(){

        return [
            "title" => "required|min:5|max:500",
            "slug" => "required|min:5|max:500|unique:posts",
            "content" => "required|min:7",
            "description" => "required|min:7",
            "posted" => "required",
            "category_id" => "required|integer"
        ];
     }
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
        return $this->myRules();
    }
}
