<?php

namespace Service\Category\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'title'=>'required|min:3|max:190',
            "slug" => 'nullable|min:3|max:190',
            'description'=>'nullable|min:3|max:255',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,JFIF,svg|max:1024 ',
        ];
    }
}
