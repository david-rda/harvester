<?php
    namespace App\Http\Interfaces;

    use Illuminate\Http\Request;
    use App\Http\Requests\PasswordRequest;

    interface IPassword {
        public function ValidatePassword(PasswordRequest $request); // პაროლის ცვილებისას გაგზავნილი მონაცემების ვალიდაციის მეთოდი

        public function ChangePassword(PasswordRequest $request); // პაროლის ცვლილების მეთოდი
    }
?>