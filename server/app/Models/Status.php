<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Statement;

class Status extends Model
{
    use HasFactory;

    protected $table = "statuses";

    protected $primaryKey = "id";

    protected $fillable = [
        "status_name"
    ];

    public $timestamps = true;

    // სტატუსების ცხრილის დაკავშირება განაცხადებთან
    public function statement() {
        return $this->belongsTo(Statement::class, "status_id", "id");
    }
}
