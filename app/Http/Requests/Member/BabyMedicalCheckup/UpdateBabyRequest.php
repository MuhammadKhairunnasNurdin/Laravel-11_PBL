<?php

namespace App\Http\Requests\Member\BabyMedicalCheckup;

use App\Enum\BabyMedicalCheckup\BreastMilkEnum;
use App\Enum\BabyMedicalCheckup\GroupCategoryEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;

class UpdateBabyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Replace and after validation return just Baby data.
     *
     * If we use this request with other request,
     * we can retrieve just part Baby data
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->request->replace(
            $this->only([
                'head_perimeter',
                'arm_perimeter',
                'breast_milk',
                'group_category',
                'old_baby_data'
            ])
        );

        $this->merge([
            'old_baby_data' => decrypt($this->input('old_baby_data')),
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
            'head_perimeter' => [
                'bail',
                'required',
                'numeric',
                'regex:^\d{1,3}(\.\d{1,3})?$'
            ],
            'arm_perimeter' => [
                'bail',
                'required',
                'numeric',
                'regex:^\d{1,3}(\.\d{1,3})?$'
            ],
            'breast_milk' => [
                'bail',
                'required',
                'string',
                Rule::in(BreastMilkEnum::getValues()),
            ],
            'group_category' => [
                'bail',
                'required',
                'string',
                Rule::in(GroupCategoryEnum::getValues()),
            ],
            'old_baby_data' => [
                'bail',
                'required',
                'array',
                'min:4',
                'max:7'
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
                        $this->input('old_baby_data'),
                        $this->all()
                    )
                )
            )
        );
    }
}
