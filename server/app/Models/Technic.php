<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Statement;

class Technic extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "technics";

    protected $primaryKey = "id";

    protected $fillable = [
        "statement_id",
        "technic_name",
        "technic_model",
        "technic_engine_speed",
        "technic_issue_date",
        "technic_manufacturer_country",
        "technic_use_for",
        "technic_supplier_company",
        "technic_supplier_company_id_number",
        "technic_price",
        "technic_quantity",
    ];

    protected $dates = [
        "deleted_at"
    ];

    public $timestamps = true;

    //  კავშირის დამყარება განაცხადების ცხრილთან
    public function statement() {
        return $this->belongsTo(Statement::class, "id", "statement_id");
    }
}
