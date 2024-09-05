<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'mission_id' => ['required', 'integer', 'exists:missions,id'],
            'name' => ['required', 'string', 'max:50'],
            'description' => ['nullable', 'string', 'max:200'],
            'time' => ['nullable', 'date'],
            'status' => ['required'],
        ];
    }
}
