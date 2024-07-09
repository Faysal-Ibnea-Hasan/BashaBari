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
        Schema::create('tbl_tenants', function (Blueprint $table) {
            $table->id();



            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('password')->nullable();
            $table->string('image')->nullable();
            $table->string('email')->nullable();
            $table->string('nid')->nullable();
            $table->string('tenant_Id')->nullable();
            $table->string('assign_status')->nullable();





            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('tbl_tenants');
    }
};
