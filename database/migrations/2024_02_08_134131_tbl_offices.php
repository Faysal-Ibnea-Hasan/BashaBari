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
           Schema::create('tbl_offices', function (Blueprint $table) {
            $table->id();



            $table->string('office_Id')->nullable();
            $table->string('owner_Id')->nullable();
            $table->string('space')->nullable();
            $table->string('floor')->nullable();
            $table->string('location')->nullable();
            $table->string('area')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('price_range')->nullable();
            $table->string('available_from')->nullable();
            $table->string('facilities')->nullable();
            $table->string('protection_money')->nullable();
            $table->string('agreement_year')->nullable();
            $table->string('additional_condition')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->nullable();

            $table->timestamps();







        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         schema::dropIfExists('tbl_offices');
    }
};
