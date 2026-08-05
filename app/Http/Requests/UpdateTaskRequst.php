<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
             'title' => [
                'required',
                'string',
                'min:3',
                'max:255'
            ],

            'description' => [
                'nullable',
                'string',
                'max:5000'
            ],

            'status' => [
                'required',
                Rule::in(array_keys(Task::statuses())),
            ],

            'deadline' => [
                'nullable',
                'date'
            ],
        ];
    }

    public function message(): array
    {
        return [
            'title.required' => 'Введите название задачи',
            'title.min' => 'Название должно содержать минимум 3 символа',
            'title.max' => 'Название не должно превышать 255 символов',

            'description.string' => 'Описание должено быть строкой',
            'description.max' => 'Описание не должно превышать 5000 символов',

            'status.required' => 'Выберете статус задачи',
            'status.in' => 'Выбран недапустимый статус',

            'deadline.date' => 'Укажите корректную дату'
        ];
    }

}
