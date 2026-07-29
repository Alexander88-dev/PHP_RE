<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskRequst extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        return [
            'title' =>
            [
                'required',
                'string',
                'min:3',
                'max:255',
            ],
            'descriotion' =>
            [
                'nullabe',
                'string',
                'max:255',
            ],
            'status' =>
            [
                'required',
                Rule::in(array_keys(Task::statuses())),
            ],
            'deadline' =>
            [
                'nullable',
                'date',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Введите название задачи',
            'title.min' => 'Название должно содержать синимум 3 символа',
            'title.max' => 'Название не должно превышать 255 символов',

            'descriotion.string' => 'Описание должно быть строкой',
            'descriotion.max' => 'Описание не должно превышать 5000 символов',

            'status.required' => 'Выберите ствтус задачи',
            'status.in' => 'Выбран недопустимый статус',

            'deadline.date' => 'Укажите корректную дату',
        ];
    }
}
