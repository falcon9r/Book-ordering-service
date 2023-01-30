<?php

namespace App\Http\Requests\User\Book;

use App\Services\Book\BookServiceContract;
use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            //
        ];
    }
}
