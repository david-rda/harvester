<?php
    namespace App\Http\Interfaces;

    use Illuminate\Http\Request;
    use App\Http\Requests\InfoRequest;

    interface IUser {
        public function ValidateRegisterData(Request $request); // მომხმარებლის სარეგისტრაციო მონაცემების გაფილტვრა
        
        public function Register(Request $request); // მომხმარებლის რეგისტრაციის მეთოდი

        public function Update_Info(InfoRequest $request); // მომხმარებლის ინფორმაციის განახლების მეთოდი
    }
?>