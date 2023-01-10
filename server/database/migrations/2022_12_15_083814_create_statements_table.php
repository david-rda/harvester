<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statements', function (Blueprint $table) {
            $table->id();
            $table->string("applicant_name");
            $table->string("applicant_lastname");
            $table->string("applicant_phone");
            $table->string("applicant_additional_phone");
            $table->string("beneficiary_email");
            $table->string("beneficiary_juridical_status");
            $table->string("beneficiary_address1");
            $table->string("beneficiary_address2");
            $table->string("finance_condition");
            $table->string("beneficiary_name")->nullable();
            $table->string("beneficiary_lastname")->nullable();
            $table->string("beneficiary_pid")->nullable();
            $table->string("beneficiary_gender")->nullable();
            $table->string("beneficiary_company_name")->nullable();
            $table->string("beneficiary_company_id_number")->nullable();
            $table->string("beneficiary_company_director")->nullable();
            $table->string("beneficiary_company_phone")->nullable();
            $table->string("beneficiary_company_additional_phone")->nullable();
            $table->integer("status_id")->nullable();
            $table->string("own_finance")->nullable()->default(0);
            $table->string("agency_finance")->nullable()->default(0);
            $table->string("redistributable_price")->nullable();
            $table->string("total_price")->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statements');
    }
};
