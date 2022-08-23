<?php

namespace Service\Service\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Service\Service\Models\Service;

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
            'title' => 'required|min:3|max:190',
            'slug' => 'nullable|min:3|max:190',
//            'tags' => 'nullable|min:3',
            'priority' => 'required|numeric',
            'description' => 'nullable|min:3|max:1024',
            'commission' => 'required|min:0|max:100',
            'category_id' => 'nullable|exists:categories,id',
            'meta_description' => 'nullable|min:3|max:190',
            'base_price' => 'required|numeric|min:0|max:100000',
            'approved_price' => 'required|numeric|min:0|max:100000',
            'image' => 'required|mimes:jpeg,png,jpg,gif,JFIF,svg|max:1024',
            'status' => ['nullable', Rule::in(Service::$statuses)],
        ];
    }
}
