<?php
    namespace App\Http\Interfaces;

    use Illuminate\Http\Request;
    use App\Http\Requests\StatementRequest;

    interface IStatement {
        public function CreateStatement(StatementRequest $request); // განაცხადის შენახვის მეთოდი

        public function StatementList(); // განაცხადების გამოტანის მეტოდი

        public function StatementGet(int $id); // განაცხადის წამოღება აიდის მიხედვით
    }
?>