<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Technic;
use App\Models\File;
use App\Models\Founder;

class Statement extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "statements";

    protected $primaryKey = "id";

    protected $fillable = [
        "applicant_name",
        "applicant_lastname",
        "applicant_phone",
        "applicant_additional_phone",
        "beneficiary_email",
        "beneficiary_juridical_status",
        "beneficiary_address1",
        "beneficiary_address2",
        "beneficiary_company_name",
        "beneficiary_company_id_number",
        "beneficiary_company_director",
        "beneficiary_company_phone",
        "beneficiary_company_additional_phone",
        "finance_condition",
        "own_finance",
        "agency_finance",
        "redistributable_price",
        "total_price",
        "beneficiary_name",
        "beneficiary_lastname",
        "beneficiary_pid",
        "beneficiary_gender",
        "status_id"
    ];

    protected $dates = [
        "deleted_at"
    ];

    protected $appends = [
        "technics", "founders"
    ];

    protected $hidden = [
        "technic", "founder"
    ];

    public $timestamps = true;

    // კავშირის დამყარება ტექნიკის ცხრილთან
    public function technic() {
        return $this->hasMany(Technic::class, "statement_id", "id");
    }

    // დამფუძნებლების ცხრილთან დაკავშირება
    public function founder() {
        return $this->hasMany(Founder::class, "statement_id", "id");
    }

    // სტატუსების ცხრილთან კავშირის დამყარება
    public function status() {
        return $this->hasOne(Status::class, "id", "status_id");
    }

    // კავშირის დამყარება ფაილების ცხრილთან
    public function file() {
        return $this->hasMany(File::class, "statement_id", "id");
    }

    // technics ველში ჩაიყრება განაცხადის ცხრილთან დაკავშირებული ტექნიკები
    public function technics() : Attribute {
        return Attribute::make(
            get : fn() => $this->technic
        );
    }

    // განაცხადის დამატების თარიღის ფორმატის ცვლილება მონაცემის გამოტანისას
    public function createdAt() : Attribute {
        return Attribute::make(
            get : fn($value) => $this->asDateTime($value)->setTimezone("Asia/Tbilisi")->format("m/d/Y H:i")
        );
    }

    // მეპაიების მონაცემების ჩასმა განაცხადების data-ში
    public function founders() : Attribute {
        return Attribute::make(
            get : fn() => $this->founder
        );
    }
}