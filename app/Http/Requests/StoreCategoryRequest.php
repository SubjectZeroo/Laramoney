<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'transaction_category_id' => 'required|exists:transaction_categories,id',
            'name' => ['required', 'string', 'max:255', 'unique:categories'],
            'description' =>  ['nullable', 'string', 'max:255'],
        ];
    }
}
