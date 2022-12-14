<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Http\User;

class Role extends Model
{
    use HasFactory;

    protected $table = "roles";

    protected $primaryKey = "id";

    protected $fillable = [
        "role_name",
    ];

    // მოცემულ მასივში მოთავსებული სვეტების სახელები არ გამოჩნდება ბაზიდან წამოღებულ შედეგში
    protected $hidden = [
        "created_at", "updated_at"
    ];

    public $timestamps = true;

    // მიმდინარე მოდელის/ცხრილი დაკავშირება ხდება user-ების მოდელთან
    public function user() {
        return $this->belongsTo(User::class, "role_id", "id"); // როლებიც მოდელი/ცხრილი ეკუთვნის იუზერებისას
    }
}