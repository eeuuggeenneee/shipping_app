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
        Schema::create('booking_details_tbl', function (Blueprint $table) {
            $table->id('details_id');
            $table->unsignedBigInteger('booking_id')->nullable();
            $table->string('booking_number', 20)->nullable();
            $table->string('container_number', 20)->nullable();
            $table->integer('order_step')->nullable();
            $table->string('status_date', 30)->nullable();
            $table->string('status_loc', 50)->nullable();
            $table->string('status_desc', 100)->nullable();
            $table->string('eta_ata', 3)->nullable();
            $table->date('date_created')->nullable();
            $table->timestamps();

            $table->unique(['container_number', 'order_step', 'status_date'], 'unique_entry_details');
            $table->foreign('booking_id')->references('booking_id')->on('booking_tbl')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_details_tbl');
    }
};
