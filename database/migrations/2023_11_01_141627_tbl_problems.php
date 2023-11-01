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
        Schema::create('tbl_problems', function (Blueprint $table) {
            $table->id();

            $table->string('building_Id')->nullable();
            $table->string('flat_Id')->nullable();
            $table->string('tenant_Id')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->date('date')->nullable();
            $table->string('status')->default('Unsolved');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_problems');
    }
};
