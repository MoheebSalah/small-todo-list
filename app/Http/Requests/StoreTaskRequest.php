<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable'],
            'status' => ['required', 'in:pending,in_progress,done'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Give the task a Title',
            'title.max' => 'Title is too long',
            'status.in' => 'Invalid task status',
        ];
    }
}
