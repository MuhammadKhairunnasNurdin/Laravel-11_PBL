<?php

namespace App\Http\Requests\Member\Activity;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivityRequest extends FormRequest
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
            'name' => [
                'bail',
                'required',
                'string',
                'regex:/^[\w\s\n\.\,\!\;\:\?\(\)\-]{5,100}$/',
            ],
            'date_of_activity' => [
                'bail',
                'required',
                'date_format:Y-m-d',
            ],
            'start_time' => [
                'bail',
                'required',
                'date_format:H:i',
            ],
            'place' => [
                'bail',
                'required',
                'string',
                'regex:/^[\w\s\n\.\,\!\;\:\?\(\)\-]{5,200}$/',
            ],
        ];
    }
}
