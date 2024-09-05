<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MissionStoreRequest extends FormRequest
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
            'account_id' => ['required', 'integer', 'exists:accounts,id'],
            'name' => ['required', 'string', 'max:50'],
            'company' => ['nullable', 'string', 'max:50'],
            'priority' => ['nullable', 'in:low,medium,high,important'],
            'urgency' => ['nullable', 'in:slow,medium,fast,urgent'],
            'submission_date' => ['nullable', 'date'],
            'status' => ['nullable', 'in:waiting,received,pending,submitted,accepted'],
            'income' => ['nullable', 'integer'],
        ];
    }
}
