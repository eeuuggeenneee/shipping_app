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
        Schema::create('booking_tbl', function (Blueprint $table) {
            $table->id('booking_id');
            $table->string('booking_number', 20)->nullable();
            $table->string('sto_number', 20)->nullable();
            $table->string('customer_po', 60)->nullable();
            $table->date('date_booked')->nullable();
            $table->integer('batts_qty')->nullable();
            $table->string('forwarder', 20)->nullable();
            $table->string('carrier', 20)->nullable();
            $table->string('container_number', 20)->nullable();
            $table->integer('booking_status')->default(0);
            $table->integer('latest_step')->default(0);
            $table->dateTime('date_created')->nullable();
            $table->boolean('is_active')->default(true);

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
        Schema::dropIfExists('booking_tbl');
    }
};
