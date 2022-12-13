<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Http\Interfaces\IAuth; // ავტორიზაციის კლასის ინტერფეისი
use Auth; // ავტორიზაციისთვის საჭირო ფასადი
use App\Models\User;

class AuthController extends Controller implements IAuth
{
    /**
     * მოცემული მეთოდის საშუალებით ხდება ფორმიდან გაგზავნილი მონაცემების გაფილტვრა
     * @param AuthRequest
     * @return boolean
     */
    public function ValidateData(AuthRequest $request) {
        try {
            if($request->validated()):
                return true;
            endif;
        }catch(Exception $e) {
            return false;
        }
    }

    /**
     * ავტორიზაციის მეთოდი
     * @method POST
     * @param Request
     * @return json
     */
    public function Login(Request $request) {
        $validated = $this->ValidateData($request);

        $credentials = array(
            "email" => $request->email,
            "password" => $request->password
        );

        if($validated) {
            if(Auth::attempt($credentials)) {
                $token = Auth::user()->createToken("TOKEN")->accessToken;

                return response()->json([
                    "user" => Auth::user(),
                    "token" => $token
                ], 200);
            }else {
                return response()->json([
                    "login_error" => "ელ. ფოსტა ან პაროლი არასწორია."
                ], 403);
            }
        }else {
            return response()->json([
                "error" => "არასწორი ფორმატის მონაცემები."
            ], 422);
        }
    }
}
