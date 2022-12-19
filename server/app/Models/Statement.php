<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Technic;

class Statement extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "statements";

    protected $primaryKey = "id";

    protected $fillable = [
        "beneficiary_name",
        "beneficiary_lastname",
        "beneficiary_phone",
        "beneficiary_additional_phone",
        "beneficiary_email",
        "beneficiary_juridical_status",
        "beneficiary_address1",
        "beneficiary_address2",
        "finance_condition",
        "own_finance",
        "agency_finance",
    ];

    protected $dates = [
        "deleted_at"
    ];

    public $timestamps = true;

    // კავშირის დამყარება ტექნიკის ცხრილთან
    public function technic() {
        return $this->hasMany(Technic::class, "statement_id", "id");
    }
}