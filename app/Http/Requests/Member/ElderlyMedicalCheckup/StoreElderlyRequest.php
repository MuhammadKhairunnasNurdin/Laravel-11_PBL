<?php

namespace App\Http\Requests\Member\ElderlyMedicalCheckup;

use Illuminate\Foundation\Http\FormRequest;

class StoreElderlyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Replace and after validation return just Elderly data.
     *
     * If we use this request with other request,
     * we can retrieve just part Elderly data
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->request->replace(
            $this->only([
                'stomach_perimeter',
                'gout',
                'blood_sugar',
                'blood_pressure',
                'cholesterol',
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
            'stomach_perimeter' => [
                'bail',
                'required',
                'numeric',
                'regex:^\d{1,3}(\.\d{1,3})?$',
            ],
            'gout' => [
                'bail',
                'required',
                'numeric',
                'regex:^\d{1,2}(\.\d{1,3})?$',
            ],
            'blood_sugar' => [
                'bail',
                'required',
                'integer',
                'digits_between:0,999',
            ],
            'blood_pressure' => [
                'bail',
                'required',
                'integer',
                'digits_between:0,999',
            ],
            'cholesterol' => [
                'bail',
                'required',
                'integer',
                'digits_between:0,999',
            ],
        ];
    }
}
