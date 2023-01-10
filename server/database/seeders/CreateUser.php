<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->role_id = 3;
        $user->name = "დავით";
        $user->lastname = "ჭეჭელაშვილი";
        $user->birth_date = "07-06-1999";
        $user->personal_id = 59001118960;
        $user->mobile_number = 598134555;
        $user->email = "davit.tchetchelashvili@yahoo.com";
        $user->password = bcrypt(1234);
        $user->save();
    }
}
