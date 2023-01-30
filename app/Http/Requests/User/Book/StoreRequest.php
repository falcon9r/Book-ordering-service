<?php

namespace App\Http\Requests\User\Book;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'code' => 'required|string|min:8|max:8',
            'annotation' => 'required|string',
            'book_cover' => 'required|mimes:jpeg,png,jpg,gif',
            'price' => 'numeric|required|min:0',
            'count_of_pages' => 'required|integer|min:0',
            'age_limit' => 'required|integer|min:0',
            'publication' => 'integer|required|min:1901|max:2155',
            'categories.*' => "integer|exists:categories,id",
            'authors.*' => "integer|exists:authors,id"
        ];
    }
}
