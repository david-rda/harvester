<?php
    namespace App\Http\Interfaces;

    use Illuminate\Http\Request;
    use App\Http\Requests\StatementRequest;

    interface IStatement {
        public function CreateStatement(StatementRequest $request); // განაცხადის შენახვის მეთოდი
    }
?>