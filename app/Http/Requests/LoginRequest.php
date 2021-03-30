<?php

namespace App\Http\Requests;

use App\Exceptions\ParameterException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class LoginRequest extends FormRequest
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
            'email' => 'required|between:9,20|email',
            'password' => 'required|digits_between:9,20|numeric',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $error_message = $validator->errors()->first();

        throw new ParameterException($error_message);
    }
}