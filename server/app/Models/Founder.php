<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Statement;

class Founder extends Model
{
    use HasFactory;

    protected $table = "founders";

    protected $primaryKey = "id";

    protected $fillable = [
        "statement_id",
        "founder_fullname",
        "pid_or_company_id",
        "part_percent",
    ];

    public $timestamps = true;

    // დამფუძნებლების ცხრილის მიმაგრება განაცხადებზე
    public function statement() {
        return $this->belongsTo(Statement::class, "id", "statement_id");
    }
}
