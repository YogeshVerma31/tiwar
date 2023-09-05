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
        Schema::create('kycs', function (Blueprint $table) {
            $table->id();
            $table->string("first_name")->null;
            $table->string("last_name")->null;
            $table->string("father_name")->null;
            $table->string("phone_name")->null;
            $table->string("qualification")->null;
            $table->string("special_education")->null;
            $table->bigInteger("category_id")->null;
            $table->bigInteger("subcategory_id")->null;
            $table->string("email_id")->null;
            $table->string("id_proof")->null;
            $table->string("id_number")->null;
            $table->bigInteger("state_id")->null;
            $table->bigInteger("city_id")->null;
            $table->string("address")->null;
            $table->string("pincode")->null;
            $table->bigInteger("created_by");
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
        Schema::dropIfExists('kycs');
    }
};
