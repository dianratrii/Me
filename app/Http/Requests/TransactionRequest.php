<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'transaction_type' => 'required',
            'category_id' => 'required',
            'amount' => 'required',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'The user_id is Needed to create Transaction',
            'transaction_type.required' => 'The Transaction Type is Needed to Create Transaction',
            'category_id.required' => 'The category is Needed to Create Transaction',
            'nominal.required' => 'The nominal is Needed to Create Transaction',
            'description.required' => 'The Description is Needed to Create Transaction'
        ];
    }
}
