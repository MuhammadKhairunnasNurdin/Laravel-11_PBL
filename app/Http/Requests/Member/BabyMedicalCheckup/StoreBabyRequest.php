<?php

namespace App\Http\Requests\Member\BabyMedicalCheckup;

use App\Enum\BabyMedicalCheckup\BreastMilkEnum;
use App\Enum\BabyMedicalCheckup\GroupCategoryEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBabyRequest extends FormRequest
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
        ];
    }
}
