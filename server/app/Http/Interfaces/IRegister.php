<?php
    namespace App\Http\Interfaces;

    use Illuminate\Http\Request;
    use App\Http\Requests\AuthRequest;
    use App\Http\Requests\RegisterRequest;

    interface IRegister {          
        public function ValidateRegisterData(RegisterRequest $request); // მომხმარებლის სარეგისტრაციო მონაცემების გაფილტვრა
        
        public function Register(RegisterRequest $request); // მომხმარებლის რეგისტრაციის მეთოდი
    }
?>