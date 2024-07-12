<?php

namespace App\Http\Requests\Member\Activity;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActivityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Replace and after validation return just Activity data.
     *
     * If we use this request with other request,
     * we can retrieve just part Activity data
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->request->replace(
            $this->only([
                'user_id',
                'name',
                'date_of_activity',
                'start_time',
                'place',
                'old_activity_data',
            ])
        );

        $this->merge([
            'old_activity_data' => decrypt($this->input('old_activity_data')),
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
            'old_activity_data' => [
                'bail',
                'required',
                'array',
                'min:5',
                'max:8'
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
                        $this->input('activity'),
                        $this->all()
                    )
                )
            )
        );
    }
}
