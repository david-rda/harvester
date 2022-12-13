<?php
    namespace App\Http\Interfaces;

    use Illuminate\Http\Request;

    interface IRegister {          
        public function ValidateRegisterData(Request $request); // მომხმარებლის სარეგისტრაციო მონაცემების გაფილტვრა
        
        public function Register(Request $request); // მომხმარებლის რეგისტრაციის მეთოდი
    }
?>