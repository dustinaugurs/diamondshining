<?php

namespace App\Http\Requests\Frontend\Auth;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class RegisterRequest.
 */
class RegisterRequest extends Request
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
            'first_name'           => 'required|max:255',
            'last_name'            => 'required|max:255',
            'email'                => ['required', 'email', 'max:255', Rule::unique('users')],
            'password'             => 'required|min:8|confirmed|regex:"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$"',
            'company'              => 'required|max:255',
            'VATnumber'            => 'required|max:255',
            'designation'          => 'required|max:255',
            'phone_no'             => 'required|min:11|numeric',
            'address_line1'       => 'required|max:255',
            'address_line2'       => 'required|max:255',
            'country'             => 'required|max:255',
            'state'               => 'required|max:255',
            'city'                => 'required|max:255',
            'zip'                 => 'required|max:255',
            'website'             => 'required|max:255',   //'url|max:255'
            'is_term_accept'       => 'required',
            'g-recaptcha-response' => 'required_if:captcha_status,true|captcha',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'g-recaptcha-response.required_if' => trans('validation.required', ['attribute' => 'captcha']),
            'password.regex'                   => 'Password must contain at least 1 uppercase letter and 1 number.',
        ];
    }
}
