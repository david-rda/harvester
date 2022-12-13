<?php
    namespace App\Http\Interfaces;

    use Illuminate\Http\Request;
    use App\Http\Requests\AuthRequest;

    interface IAuth {  
        public function ValidateData(AuthRequest $request); // ავტორიზაციის მონაცემთა ვალიდაცია  
        
        public function Login(Request $request); // ავტორიზაციის მეთოდი
    }
?>