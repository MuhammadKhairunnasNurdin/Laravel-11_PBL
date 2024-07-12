<?php

namespace App\Http\Requests\Member\Article;

use App\Enum\Article\TagEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Replace and after validation return just Article data.
     *
     * If we use this request with other request,
     * we can retrieve just part Article data
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->request->replace(
            $this->only([
                'user_id',
                'title',
                'body',
                'excerpt',
                'tag',
                'photo_article',
                'old_article_data',
            ])
        );

        $this->merge([
            'old_article_data' => decrypt($this->input('old_article_data')),
        ]);
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
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:2048',
            ],
            'old_article_data' => [
                'bail',
                'required',
                'array',
                'min:6',
                'max:9'
            ],
        ];
    }

    /**
     * compare updated data from user form with old data in
     * database and just replace request input with data that changes
     *
     * @return void
     */
    protected function passedValidation(): void
    {
        $this->request->replace(
            $this->only(
                array_keys(
                    array_diff_assoc(
                        $this->input('article'),
                        $this->all()
                    )
                )
            )
        );
    }
}
