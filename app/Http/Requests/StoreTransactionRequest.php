<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
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
            'name' =>  ['required', 'string', 'max:255'],
            'amount' => 'required|numeric',
            'reference' =>  ['required', 'string', 'max:255'],
            'transaction_date' =>  'required',
            'account_id' => 'required|exists:accounts,id',
            'transaction_category_id' => 'required|exists:transaction_categories,id',
            'category_id' => 'required|exists:categories,id',
            'description' =>  ['nullable', 'string', 'max:255'],
        ];
    }
}
