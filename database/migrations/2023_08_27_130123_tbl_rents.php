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
        Schema::create('tbl_rents', function (Blueprint $table) {
            $table->id();

            
            
            $table->string('tenant_Id')->nullable();
            $table->string('flat_Id')->nullable();
            
            
           
            
            
            
            


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('tbl_rents');
    }
};
