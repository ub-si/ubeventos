<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'created_by' => 'nullable',
            'title' => 'required|string|min:1|max:255',
            'description' => 'required|string|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'local' => 'required|string|min:1|max:255',
            'workload' => 'required'
        ];
    }
}
