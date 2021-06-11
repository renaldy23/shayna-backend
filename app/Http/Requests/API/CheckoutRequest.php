<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

use function PHPSTORM_META\map;

class CheckoutRequest extends FormRequest
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
            "name" => "required|max:255",
            "email" => "required|max:255",
            "number" => "required",
            "address" => "required",
            "transaction_total" => "required",
            "transaction_status" => 'nullable|in:PENDING,SUCCESS,FAILED',
            "transaction_details" => "required|array",
        ];
    }
}
