<?php

namespace Service\Order\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Service\Order\Models\Order;

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
            'date' => 'required',
            'time' => 'required',
            'digital_verification' => 'required|min:3|max:190',
            'user_id' => 'required|exists:users,id',
            'address_id' => 'required|exists:addresses,id',
            'specialist_id' => 'nullable|exists:specialists,id',
            'amount' => 'nullable|numeric|min:0|max:100000',
            'status' => ['nullable', Rule::in(Order::$statuses)],
        ];
    }
}
