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
            "applicant_name" => "required|string",
            "applicant_lastname" => "required|string",
            "applicant_phone" => "required|numeric",
            "applicant_additional_phone" => "required|numeric",
            "beneficiary_email" => "required|string|email",
            "beneficiary_juridical_status" => "required|string",
            "beneficiary_address1" => "required|string",
            "beneficiary_address2" => "required|string",
            "finance_condition" => "required|string",
            "names" => "required|string",
            "models" => "required|string",
            "engines" => "required",
            "issue_dates" => "required",
            "manufacturers" => "required|string",
            "use_fors" => "required|string",
            "suppliers" => "required|string",
            "company_ids" => "required|numeric",
            "prices" => "required",
            "quantities" => "required",
            "beneficiary_name" => "required_if:beneficiary_name, !=, null",
            "beneficiary_lastname" => "required_if:beneficiary_lastname, !=, null",
            "beneficiary_pid" => "required_if:beneficiary_pid, !=, null",
            "beneficiary_gender" => "required_if:beneficiary_gender, !=, null",
        ];
    }

    /* მოცემული მეთოდი აბრუნებს ვალიდაციის სეტყობინებებს,
     * რომლებიც ვერ დადასტურდება ზემოარნიშნულ მეთოდში
     */
    public function messages() {
        return [
            "applicant_name.required" => "შეიყვანეთ განმცხადებლის სახელი.",
            "applicant_lastname.required" => "შეიყვანეთ განმცხადებლის გვარი.",
            "applicant_phone.required" => "შეიყვანეთ განმცხადებლის მობილურის ნომერი",
            "applicant_additional_phone.required" => "შეიყვანეთ განმცხადებლის დამატებითი მობილურის ნომერი",
            "beneficiary_email.required" => "შეიყვანეთ თქვენი ელ. ფოსტის მისამართი",
            "beneficiary_email.email" => "შეიყვანეთ სწორი ფორმატის ელ. ფოსტის მისამართი",
            "beneficiary_juridical_status.required" => "შეიყვანეთ თქვენი იურიდიული სტატუსი",
            "beneficiary_address1.required" => "შეიყვანეთ თქვენი ფაქტობრივი მისამართი",
            "beneficiary_address2.required" => "შეიყვანეთ თქვენი იურიდიული მისამართი",
            "finance_condition.required" => "შეიყვანეთ თანადაფინანსების პირობა",
            "names.required" => "შეიყვანეთ ტექნიკის დასახელება",
            "models.required" => "შეიყვანეთ ტექნიკის მოდელი",
            "engines.required" => "შეიყვანეთ ტექნიკის ძრავის სიმძლავრე",
            "issue_dates.required" => "შეიყვანეთ ტექნიკის გამოშვების თარიღი",
            "manufacturers.required" => "შეიყვანეთ ტექნიკის მწარმოებელი ქვეყნა",
            "use_fors.required" => "შეიყვანეთ ტექნიკის დანიშნულება",
            "suppliers.required" => "შეიყვანეთ ტექნიკის მომწოდებელი კომპანიის სახელი",
            "company_ids.required" => "შეიყვანეთ შეიყვანეთ მომწოდებელი კომპანიის საიდენტიფიკაციო კოდი",
            "prices.required" => "შეიყვანეთ 1 ერთეული ტექნიკის ფასი",
            "quantities.required" => "შეიყვანეთ ტექნიკის რაოდენობა",
            "beneficiary_name.required" => "შეიყვანეთ ბენეფიციარის სახელი",
            "beneficiary_lastname.required" => "შეიყვანეთ ბენეფიციარის გვარი",
            "beneficiary_pid.required" => "შეიყვანეთ ბენეფიციარის პირადი ნომერი",
            "beneficiary_gender.required" => "აირჩიეთ ბენეფიციარის სქესი"
        ];
    }
}
