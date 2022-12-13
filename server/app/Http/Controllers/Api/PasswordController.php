<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use App\Http\Requests\PasswordRequest;
use App\Http\Interfaces\IPassword;

class PasswordController extends Controller implements IPassword
{
    // პაროლის ცვილებისას გაგზავნილი მონაცემების ვალიდაციის მეთოდი
    public function ValidatePassword(PasswordRequest $request) {
        try {
            $validated = $request->validated();
            return true;
        }catch(Exception $e) {
            return false;
        }
    }

    /**
     * პაროლის ცვლილების მეთოდი
     * @method POST,
     * @return json data
     * @param Request
     */
    public function ChangePassword(PasswordRequest $request) {
        $validated = $this->ValidatePassword($request); // შეყვანილი მნიშვნელობების ვალიდირება/გაფილტვრა

        if($validated) {
            try {
                $user = User::whereId(Auth::id())->first(); // კონკრეტულ იუზერზე აიდით წვდომა
                
                // მოხდება გადამოწმება მიმდინარე შეყვანილი პაროლი ემთხვევა თუ არა ნამდვილად არსებულ პაროლს
                $pass_check = Hash::check($request->validated()["current_password"], $user->password);

                if($pass_check) {
                    // ბაზაში ჩაიწერება ახალი პაროლი
                    $user->password = Hash::make($request->validated()["new_password"]);
                    $user->save(); // ცვლილებების შენახვა

                    return response()->json([
                        "changed" => true,
                        "message" => "პაროლი წარმატებით შეიცვალა"
                    ], 200);
                }else {
                    return response()->json([
                        "changed" => false,
                        "message" => "მიმდინარე პაროლი შეიყვანეთ სწორად"
                    ], 422);
                }
            }catch(Exception $e) {
                return response()->json([
                    "changed" => false,
                    "error" => "პაროლის შეცვლა ვერ განხორციელდა"
                ], 422);
            }
        }
    }
}
