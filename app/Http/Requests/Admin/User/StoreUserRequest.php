<?php

namespace App\Http\Requests\Admin\User;

use App\Enum\User\RoleEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Replace and after validation return just User data.
     *
     * If we use this request with other request,
     * we can retrieve just part User data
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->request->replace(
            $this->only([
                'civilian_id',
                'username',
                'email',
                'password',
                'password_confirmation',
                'role',
                'photo_profile',
            ])
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'civilian_id' => [
                'bail',
                'required',
                'integer',
                'exists:civilian,id'
            ],
            'username' => [
                'bail',
                'required',
                'string',
                /**
                 * Must start with an alphabetic character.
                 * Can contain the following characters: a-z, A-Z, 0-9, -, and _
                 */
                'regex:/^[a-zA-z][a-zA-Z0-9\-\_]{3,100}$/',
            ],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
            ],
            'password' => [
                'bail',
                'required',
                'string',
                /**
                 * At least 8 characters and max 100 characters.
                 * Must contain at least 1 uppercase letter, 1 lowercase
                 * letter, and 1 number.
                 * Can contain special characters
                 */
                'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,100}$/',
                'confirmed'
            ],
            'role' => [
                'bail',
                'required',
                'string',
                Rule::in(RoleEnum::getValues()),
                Rule::unique('users', 'role')
                    ->where('role', RoleEnum::CHAIRMAN->value)
                ->ignore($this->route('user')->id)
            ],
            'photo_profile' => [
                'bail',
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:2058'
            ]
        ];
    }
}
