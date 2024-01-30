<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PutRequest extends FormRequest
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
            "title" => "required|min:5|max:500",
            "slug" => "required|min:5|max:500|unique:posts,slug,".$this->route("post")->id,
            "content" => "required|min:7",
            "description" => "required|min:7",
            "posted" => "required",
            "category_id" => "required|integer",
            "image" => "mimes:png,jpg,jpeg|max:10240"
        ];
     }

}
