<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Statement;

class File extends Model
{
    use HasFactory;

    protected $table = "files";

    protected $primaryKey = "id";

    protected $fillable = [
        "statement_id",
        "filename",
        "original_name",
        "extension",
        "memetype",
    ];

    public $timestamps = true;

    // მოცემული ფაილების ცხრილი მიეკუთვნება განაცხადების ცხრილს
    public function statement() {
        return $this->belongsTo(Statement::class, "id", "statement_id");
    }
}
?>