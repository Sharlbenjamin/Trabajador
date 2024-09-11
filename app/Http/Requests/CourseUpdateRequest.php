<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseUpdateRequest extends FormRequest
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
    public static function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'name' => ['required', 'string', 'max:50'],
            'link' => ['nullable', 'string'],
            'category' => ['nullable', 'string', 'exists:subjects,category'],
            'topic' => ['nullable', 'string', 'exists:subjects,category'],
            'subject' => ['nullable', 'string', 'exists:subjects,category'],
            'level' => ['nullable', 'in:Easy,Medium,Hard,Difficult'],
            'status' => ['nullable', 'in:Preparing,Learning,Finished'],
            'chapters' => ['nullable', 'integer'],
            'length' => ['nullable', 'integer'],
            'progress' => ['nullable', 'integer'],
        ];
    }
}
