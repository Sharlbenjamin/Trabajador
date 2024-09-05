<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LabelStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50'],
            'color' => ['nullable', 'string', 'max:50'],
        ];
    }
}
