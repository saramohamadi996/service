<?php

namespace Service\State\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;
use Service\State\Models\State;

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
    #[ArrayShape(['name' => "string", 'status' => "array"])] public function rules(): array
    {
        return[
            'name' => 'required|min:3|max:190',
            'status' => ['nullable', Rule::in(State::$statuses)],
        ];
    }
}
