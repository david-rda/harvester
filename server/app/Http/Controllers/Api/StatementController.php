<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StatementRequest;
use App\Http\Interfaces\IStatement;
use App\Models\Statement;
use App\Models\Technic;
use Carbon\Carbon; // თარიღებთან სამუშაო ფასადი

class StatementController extends Controller implements IStatement
{
    /**
     * განაცხადის შენახვის მეთოდი
     * @method POST
     * @param StatementRequest
     * @return json
     */
    public function CreateStatement(StatementRequest $request) {
        try {
            $create = Statement::create($request->validated()); // ბენეფიციარის განაცხადის შექმნა

            // მოცემული ციკლის საშუალებით ხდება ტექნიკის დინამიური ელემენტების მნიშვნელობების მოძიება და ბაზაში შენახვა
            for($i = 0; $i < sizeof($request->names); $i++) {
                if($request->names[$i] == "undefined") continue;
    
                Technic::insert([
                    "statement_id" => $create->id, // განაცხადის აიდი, თუ რომელ განაცხადს ეკუთვნის ტექნიკები
                    "technic_name" => $request->names[$i], // ტექნიკის სახელი
                    "technic_model" => $request->models[$i], // ტექნიკის მოდელი
                    "technic_engine_speed" => $request->engines[$i], // ტექნიკის ძრავი ც/ძ
                    "technic_issue_date" => $request->issue_dates[$i], // ტექნიკის გამოშვების წელი
                    "technic_manufacturer_country" => $request->manufacturers[$i], // ტექნიკის მწარმოებელი კომპანია
                    "technic_use_for" => $request->use_fors[$i], // ტექნიკის დანიშნულება
                    "technic_supplier_company" => $request->suppliers[$i], // ტექნიკის მომწოდებელი კომპანია
                    "technic_supplier_company_id_number" => $request->company_ids[$i], // ტექნიკის მომწოდებელი კომპანიის საიდენთიფიკაციო კოდი
                    "technic_price" => $request->prices[$i], // ტექნიკის ფასი
                    "technic_quantity" => $request->quantities[$i], // ტექნიკის რაოდენობა
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now()
                ]);
            }

            return response()->json([
                "message" => "განაცხადი გაიგზავნა.",
            ], 200);
        }catch(Exception $e) {
            return response()->json([
                "message" => "განაცხადი ვერ გაიგზავნა. გთხოვთ გადაამოწმოთ მონაცემები."
            ], 422);
        }
    }
}