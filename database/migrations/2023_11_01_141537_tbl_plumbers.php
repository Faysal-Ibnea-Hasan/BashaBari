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
        Schema::create('tbl_plumbers', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('plumber_Id')->nullable();
            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_plumbers');
    }
};
