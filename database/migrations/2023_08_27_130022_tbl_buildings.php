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
        Schema::create('tbl_buildings', function (Blueprint $table) {
            $table->id();



            $table->string('name')->nullable();
            $table->string('owner_Id')->nullable();

            $table->string('developer')->nullable();
            $table->string('building_Id')->nullable();
            $table->date('date')->nullable();
            $table->string('parking')->nullable();

            $table->string('area')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('address')->nullable();








            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('tbl_buildings');
    }
};
