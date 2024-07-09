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
        Schema::create('tbl_create_search_agents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('city')->nullable();
            $table->string('room')->nullable();
            $table->string('rent_value')->nullable();
            $table->string('rent_type')->nullable();
            $table->string('rent_package')->nullable();
            $table->string('rent_month')->nullable();
            $table->string('additional_requirements')->nullable();
            $table->string('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_create_search_agents');
    }
};
