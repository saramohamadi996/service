<?php

namespace Service\Item\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Service\Item\Models\Item;

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
            'amount' => 'nullable|numeric|min:0|max:100000',
            'status' => ['nullable', Rule::in(Item::$statuses)],

        ];
    }
}
