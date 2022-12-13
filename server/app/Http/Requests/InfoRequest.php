<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
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
            "name" => "required|string",
            "lastname" => "required|string",
            "birth_date" => "required",
            "mobile_number" => "required|max:9"
        ];
    }

    /**
     * მოცემული მეთოდში მუშავდება ფორმიდან შეყვანილი მონაცემები ხდება მათთვის შეტყობინებების დამუშავება
     *
     * @return array<string, mixed>
     */
    public function messages() {
        return [
            "name.required" => "სახელის შეყვანა აუცილებელია.",
            "lastname.required" => "გვარის შეყვანა აუცილებელია.",
            "birth_date.required" => "დაბადების თარიღის შეყვანა აუცილებელია.",
            "mobile_number.required" => "მობილურის ნომრის შეყვანა აუცილებელია.",
            "mobile_number.max" => "შეიყვანეთ სწორი ფორმატის ნომერი."
        ];
    }
}
