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
        Schema::create("technics", function (Blueprint $table) {
            $table->id();
            $table->foreignId("statement_id")->constrained()->onDelete("cascade");
            $table->string("technic_name");
            $table->string("technic_model");
            $table->string("technic_engine_speed");
            $table->string("technic_issue_date");
            $table->string("technic_manufacturer_country");
            $table->string("technic_use_for");
            $table->string("technic_supplier_company");
            $table->integer("technic_supplier_company_id_number");
            $table->string("technic_price");
            $table->integer("technic_quantity");
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
        Schema::dropIfExists("technics");
    }
};