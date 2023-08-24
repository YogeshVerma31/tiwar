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
            $table->string("name")->null;
            $table->string("father_name")->null;
            $table->string("wife_name")->null;
            $table->string("children_name")->null;
            $table->string("phone_number")->null;
            $table->string("address")->null;
            $table->string("email_id")->null;
            $table->bigInteger("state_id")->null;
            $table->bigInteger("city_id")->null;
            $table->bigInteger("pincode")->null;
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
