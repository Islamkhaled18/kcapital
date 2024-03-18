<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('property_id')->unsigned();
            $table->date('date')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0 : Pending - 1:Accept - 2: Complete  - 3:Cancel');
            $table->string('name');
            $table->string('phone');
            $table->string('message', 255);
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('property_id')->references('id')->on('propertys')->onDelete('cascade');
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
        Schema::dropIfExists('offers');
    }
};
