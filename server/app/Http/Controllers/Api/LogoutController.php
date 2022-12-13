<?php

namespace App\Http\Controllers\Api;

use App\Http\Interfaces\ILogout;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LogoutController extends Controller implements ILogout
{
    public function Logout(Request $request) {
        try {
            Auth::guard("web")->logout();

            $request->session()->invalidate();

            return response()->json([
                "message" => "სისტემიდან გამოსვლა განხორციელდა."
            ], 200);
        }catch(Exception $e) {
            return response()->json([
                "error" => "დაფიქსირდა შეცდომა."
            ], 422);
        }
    }
}
