<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatementRequest extends FormRequest
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
            "beneficiary_name" => "required|string",
            "beneficiary_lastname" => "required|string",
            "beneficiary_phone" => "required|numeric",
            "beneficiary_additional_phone" => "required|numeric",
            "beneficiary_email" => "required|string|email",
            "beneficiary_juridical_status" => "required|string",
            "beneficiary_address1" => "required|string",
            "beneficiary_address2" => "required|string",
            "finance_condition" => "required|string",
        ];
    }

    /**
     * მოცემული მეთოდი აბრუნებს ვალიდაციის სეტყობინებებს,
     * რომლებიც ვერ დადასტურდება ზემოარნიშნულ მეთოდში
     */
    public function messages() {
        return [
            "beneficiary_name.required" => "შეიყვანეთ თქვენი სახელი.",
            "beneficiary_lastname.required" => "შეიყვანეთ თქვენი გვარი.",
            "beneficiary_phone.required" => "შეიყვანეთ თქვენი მობილურის ნომერი",
            "beneficiary_additional_phone.required" => "შეიყვანეთ თქვენი დამატებითი მობილურის ნომერი",
            "beneficiary_email.required" => "შეიყვანეთ თქვენი ელ. ფოსტის მისამართი",
            "beneficiary_email.email" => "შეიყვანეთ სწორი ფორმატის ელ. ფოსტის მისამართი",
            "beneficiary_juridical_status.required" => "შეიყვანეთ თქვენი იურიდიული სტატუსი",
            "beneficiary_address1.required" => "შეიყვანეთ თქვენი ფაქტობრივი მისამართი",
            "beneficiary_address2.required" => "შეიყვანეთ თქვენი იურიდიული მისამართი",
            "finance_condition.required" => "შეიყვანეთ თანადაფინანსების პირობა",
        ];
    }
}
