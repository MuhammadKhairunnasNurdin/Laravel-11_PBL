<?php

namespace App\Http\Requests\Member\Article;

use App\Enum\Article\TagEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreArticleRequest extends FormRequest
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
            'user_id' => [
                'bail',
                'required',
                'integer',
                'exists:users,id'
            ],
            'title' => [
                'bail',
                'required',
                'string',
                'regex:/^[\w\s\n\.\,\!\;\:\?\(\)\-]{5,100}$/',
            ],
            'body' => [
                'bail',
                'required',
                'string',
                'regex:/^[\w\s\n\.\,\!\;\:\?\(\)\-]{30,30000}$/',
            ],
            'excerpt' => [
                'bail',
                'required',
                'string',
                'regex:/^[\w\s\n\.\,\!\;\:\?\(\)\-]{30,200}$/',
            ],
            'tag' => [
                'bail',
                'required',
                'string',
                Rule::in(TagEnum::getValues())
            ],
            'photo_article' => [
                'bail',
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:2048',
            ],
        ];
    }
}
