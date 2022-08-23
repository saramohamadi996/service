<?php

namespace Service\City\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Service\City\Models\City;

class Store extends FormRequest
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
            'name' => 'required|min:3|max:190',
            'status' => ['nullable', Rule::in(City::$statuses)],
        ];
    }
}
