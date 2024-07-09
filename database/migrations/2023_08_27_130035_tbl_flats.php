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
        Schema::create('tbl_flats', function (Blueprint $table) {
            $table->id();



            $table->string('unit_name')->nullable();
            $table->string('building_Id')->nullable();
            $table->string('floor')->nullable();
            $table->string('area')->nullable();
            $table->string('room')->nullable();
            $table->string('washroom')->nullable();
            $table->string('balconi')->nullable();
            $table->string('rent_value')->nullable();
            $table->string('image')->nullable();
            $table->string('flat_Id')->nullable();
            $table->string('owner_Id')->nullable();
            $table->string('rent_type')->nullable();
            $table->string('rent_package')->nullable();
            $table->string('status')->nullable();







            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('tbl_flats');
    }
};
