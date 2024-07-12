<?php

namespace App\Http\Requests\Member\MedicalCheckup;

use App\Enum\MedialCheckup\GroupEnum;
use App\Enum\MedialCheckup\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMedicalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Replace and after validation return just MedicalCheckup data.
     *
     * If we use this request with other request,
     * we can retrieve just part MedicalCheckup data
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->request->replace(
            $this->only([
                'user_id',
                'civilian_id',
                'checkup_date',
                'group',
                'weight',
                'height',
                'status',
                'old_medical_data'
            ])
        );

        $this->merge([
            'old_medical_data' => decrypt($this->input('old_medical_data')),
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
            'civilian_id' => [
                'bail',
                'required',
                'integer',
                'exists:civilians,id'
            ],
            'checkup_date' => [
                'bail',
                'required',
                'date_format:Y-m-d'
            ],
            'group' => [
                'bail',
                'required',
                'string',
                Rule::in(GroupEnum::getValues())
            ],
            'weight' => [
                'bail',
                'required',
                'numeric',
                'regex:/^\d{1,3}(\.\d{1,3})?$/'
            ],
            'height' => [
                'bail',
                'required',
                'numeric',
                'regex:/^\d{1,3}(\.\d{1,3})?$/'
            ],
            'status' => [
                'bail',
                'required',
                'string',
                Rule::in(StatusEnum::getValues())
            ],
            'old_medical_data' => [
                'bail',
                'required',
                'array',
                'min:7',
                'max:10'
            ]
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
                        $this->input('old_medical_data'),
                        $this->all()
                    )
                )
            )
        );
    }
}
