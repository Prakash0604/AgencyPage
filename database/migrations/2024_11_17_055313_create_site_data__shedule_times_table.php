<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_data__shedule_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('site_data_id');
            $table->string('starting_day');
            $table->string('ending_day');
            $table->string('starting_time');
            $table->string('ending_time');
            $table->foreign('site_data_id')->references('id')->on('site_datas')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_data__shedule_times');
    }
};
