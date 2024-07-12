<?php

namespace App\Http\Requests\Admin\Civilian;

use App\Enum\Civilian\EducationEnum;
use App\Enum\Civilian\GenderEnum;
use App\Enum\Civilian\IncomeEnum;
use App\Enum\Civilian\KinshipEnum;
use App\Enum\Civilian\RtEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCivilianRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Replace and after validation return just Civilian data.
     *
     * If we use this request with other request,
     * we can retrieve just part Civilian data
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->request->replace(
            $this->only([
                'NIK',
                'NKK',
                'name',
                'date_of_birth',
                'income',
                'phone_number',
                'gender',
                'education',
                'kinship',
                'address',
                'RT',
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
            'NIK' => [
                'bail',
                'required',
                'string',
                'regex:/^\d{16,20}$/',
                'unique:civilians,NIK'
            ],
            'NKK'=> [
                'bail',
                'required',
                'string',
                'regex:/^\d{16,20}$/',
            ],
            'name' => [
                'bail',
                'required',
                'string',
                'regex:/^[a-zA-Z\s\.]{1,100}$/',
            ],
            'date_of_birth' => [
                'bail',
                'required',
                'date_format:Y-m-d'
            ],
            'income' => [
                'bail',
                'required',
                Rule::in(IncomeEnum::getValues())
            ],
            'phone_number' =>[
                'bail',
                'nullable',
                'string',
                'regex:/^\+628\d{10,10}$/',
            ],
            'gender' => [
                'bail',
                'required',
                Rule::in(GenderEnum::getValues())
            ],
            'education' => [
                'bail',
                'required',
                Rule::in(EducationEnum::getValues())
            ],
            'kinship' => [
                'bail',
                'required',
                Rule::in(KinshipEnum::getValues()),
                Rule::unique('civilians', 'kinship')
                    ->whereNot('kinship', KinshipEnum::CHILDREN->value)
                    ->where(function ($query) {
                        return $query->where('NKK', $this->input('NKK'));
                }),
            ],
            'address' => [
                'bail',
                'required',
                'string',
                'regex:/^([\w\s\n\.\,]{1,200})$/',
            ],
            'RT' => [
                'bail',
                'required',
                Rule::in(RtEnum::getValues())
            ]
        ];
    }
}
