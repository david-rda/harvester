<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function ValidateRegisterData(Request $request) {
        try {
            $this->validate($request, [
                "name" => "required|string",
                "lastname" => "required|string",
                "birth_date" => "required",
                "personal_id" => "required|number",
                "mobile_number" => "required|number",
                "email" => "required|string",
                "password" => "required|string|min:4|max:30",
                "confirm_password" => "required|string|same:password"
            ]);

            return true;
        }catch(Exception $e) {
            return false;
        }
    }

    /**
     * მომხმარებლის რეგისტრაციის მეთოდი
     * @method POST,
     * @param Request
     * @return json
     */
    public function Register(Request $request) {

    }
}
?>