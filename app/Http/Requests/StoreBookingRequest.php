<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
            'resource_id' => 'required|integer',
            'user_id' => 'required|integer',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'resource_id.required' => 'Поле "resource_id" обязательно для заполнения.',
            'user_id.required' => 'Поле "user_id" обязательно для заполнения.',
            'start_time.required' => 'Поле "start_time" обязательно для заполнения.',
            'end_time.required' => 'Поле "end_time" обязательно для заполнения.',
            'resource_id.integer' => 'Поле "resource_id" должно быть числом.',
            'user_id.integer' => 'Поле "user_id" должно быть числом.',
            'start_time.date' => 'Поле "start_time" должно быть датой.',
            'end_time.date' => 'Поле "start_time" должно быть датой.',
        ];
    }
}