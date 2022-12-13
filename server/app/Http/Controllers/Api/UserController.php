<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Interfaces\IRegister;

class UserController extends Controller implements IRegister
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
        $validated = $this->ValidateRegisterData($request);

        if($validated) {
            try {
                $user = new User(); // მომხმარებლის მოდელის ობიექტი

                $user->name = $request->name;
                $user->lastname = $request->lastname;
                $user->birth_date = $request->birth_date;
                $user->personal_id = $request->personal_id;
                $user->mobile_number = $request->mobile_number;
                $user->email = $request->email;
                $user->password = $request->password;
                
                $user->save(); // მითითებული მონაცემების შენახვა

                return response()->json([
                    "message" => "რეგისტრაცია წარმატებით დასრულდა."
                ], 200);
            }catch(Exception $e) {
                return response()->json([
                    "register_error" => "რეგისტრაცია ვერ განხორციელდა."
                ], 422);
            }
        }
    }
}
?>