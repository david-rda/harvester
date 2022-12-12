<?php
    namespace App\Http\Interfaces;

    use Illuminate\Http\Request;

    interface IAuth {  
        public function ValidateData(Request $request); // ავტორიზაციის მონაცემთა ვალიდაცია  
        
        public function Login(Request $request); // ავტორიზაციის მეთოდი
    }
?>