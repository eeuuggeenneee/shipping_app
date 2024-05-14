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
        Schema::create('booking_status_tbl', function (Blueprint $table) {
            $table->id('status_id');
            $table->unsignedBigInteger('booking_id')->nullable();
            $table->string('pod', 50)->nullable();
            $table->integer('booking_status')->nullable();
            $table->dateTime('date_created')->nullable();
            $table->string('eta', 30)->nullable();
            $table->string('ata', 30)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->unique(['booking_id', 'eta', 'ata'], 'unique_entry_status');
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
        Schema::dropIfExists('booking_status_tbl');
    }
};
