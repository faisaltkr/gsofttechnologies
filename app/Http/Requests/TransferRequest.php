<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       
        return [
            'amount' => 'required|numeric',
            'email' => 'required|email|exists:users,email',
            'type' => 'required',Rule::in(['transfer']),
        ];
    }

    public function messages()
    {
        return [
            'email.exists' => "This email is not associated with any existing account"
        ];
    }
}
