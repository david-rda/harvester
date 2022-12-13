<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            "email" => "required|email",
            "password" => "required|min:4|max:30"
        ];
    }

    public function messages() {
        return [
            "email.required" => "ელ. ფოსტა აუცილებელია.",
            "password.required" => "პაროლი აუცილებელია.",
            "password.min" => "პაროლი უნდა შედგებოდეს მინიმუმ 4 სიმბოლოსგან.",
            "password.max" => "პაროლის სიმბოლოთა რაოდენობა არ უნდა აღემატებოდეს 30-ს."
        ];
    }
}
