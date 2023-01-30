<?php

namespace App\Http\Requests\User\Book;

use App\Services\Book\BookServiceContract;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(BookServiceContract $bookServiceContract)
    {
        return $bookServiceContract->canAction($this->route('book'));
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
            'price' => 'numeric|required|min:0',
            'count_of_pages' => 'required|integer|min:0',
            'age_limit' => 'required|integer|min:0',
            'publication' => 'integer|required|min:1901|max:2155',
            'categories.*' => "integer|exists:categories,id"
        ];
    }
}
