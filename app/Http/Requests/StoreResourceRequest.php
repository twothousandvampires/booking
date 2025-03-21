<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResourceRequest extends FormRequest
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
            'name' => 'required|string',
            'type' => 'required|string',
            'description' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле "Название" обязательно для заполнения.',
            'type.required' => 'Поле "Тип" обязательно для заполнения.',
            'name.max' => 'Поле "Название" не должно превышать 255 символов.',
            'type.max' => 'Поле "Тип" не должно превышать 255 символов.',
            'description.string' => 'Поле "Описание" должно быть строкой.',
        ];
    }
}
