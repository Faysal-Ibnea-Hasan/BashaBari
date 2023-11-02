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
        Schema::create('tbl_supports', function (Blueprint $table) {
            $table->id();
            
            $table->string('owner_Id')->nullable();
            $table->string('building_Id')->nullable();
            $table->string('supervisor_Id')->nullable();
            $table->string('plumber_Id')->nullable();
            $table->string('electrician_Id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_supports');
    }
};
