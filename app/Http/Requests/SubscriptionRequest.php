<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SubscriptionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email'       => 'required|email|unique:subscriptions',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required',
            'email.unique' => 'Email is already taken'
        ];
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($code = 404,$message = 'Operation Failed !!')
    {
        $response = [
            'success' => false,
            'message' => $message,
            'data'    => []
        ];

        return response()->json($response, $code);
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $response = [
            'success' => false,
            'message' => $validator->errors()->first(),
        ];
        throw (new HttpResponseException(response()->json($response, 422)));
    }
}
