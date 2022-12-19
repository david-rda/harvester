<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StatementRequest;
use App\Http\Interfaces\IStatement;
use App\Models\Statement;

class StatementController extends Controller implements IStatement
{
    /**
     * @method POST
     * @param StatementRequest
     * @return json
     */
    public function CreateStatement(StatementRequest $request) {
        try {
            Statement::create($request->validated());
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
