<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "role_id",
        "name",
        "lastname",
        "birth_date",
        "personal_id",
        "mobile_number",
        "email",
        "password",
    ];

    protected $primaryKey = "id";

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    // მოცემული მეთოდი პასუხისმგებელია ბაზაში დაბადების თარიღის ფორმატის სტილის ჩაწერაზე
    public function birthDate() : Attribute {
        return Attribute::make(
            set : fn($value) => $this->birthDate = $this->asDateTime($value)->setTimezone("Asia/Tbilisi")->format("d-m-Y")
        );
    }

    // მიმდინარე მოდელის/ცხრილი დაკავშირება ხდება როლების მოდელთან/ცხრილთან
    public function role() {
        return $this->hasOne(Role::class, "id", "role_id"); // იუზერების მოდელს/ცხრილს აქვს როლების ცხრილიდან ერთი ჩანაწერი
    }
}
