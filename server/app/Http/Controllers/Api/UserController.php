<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Interfaces\IRegister;
use App\Models\User;

class UserController extends Controller implements IRegister
{
    public function ValidateRegisterData(Request $request) {
        try {
            $this->validate($request, [
                "name" => "required|string",
                "lastname" => "required|string",
                "birth_date" => "required",
                "personal_id" => "required|numeric",
                "mobile_number" => "required|numeric",
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
                User::create($request->all());

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

    /**
     * ავტორიზირებული მომხმარებლის ინფორმაციის წამოღება
     * @method GET
     * @param int $id
     * @return json
     */
    public function User_Get($id) {
        return User::find(Auth::id());
    }
}
?>