<?php

namespace Service\Attribute\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Service\Attribute\Models\Attribute;
use Illuminate\Validation\Rule;

class Update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
//        return auth()->check() == true;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return[
            'title' => 'required|min:3|max:190',
            'service_id' => 'required|exists:services,id',
            'status' => ['nullable', Rule::in(Attribute::$statuses)],
            "type" => ["required", Rule::in(Attribute::$types)],
        ];
    }
}
