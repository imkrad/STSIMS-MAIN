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
        Schema::create('configurations', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('acronym',20)->default('DOST-IX');
            $table->string('name',100)->default('Department of Science and Technology - IX');
            $table->string('subname',100)->default('DOST Management System');
            $table->longText('description');
            $table->string('logo')->nullable();  
            $table->string('logo_light')->nullable();    
            $table->string('logo_dark')->nullable();  
            $table->string('icon')->nullable();  
            $table->string('version');    
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configurations');
    }
};
