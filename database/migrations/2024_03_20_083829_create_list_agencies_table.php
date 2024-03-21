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
        Schema::create('list_agencies', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->tinyIncrements('id');
            $table->string('name');
            $table->string('code');
            $table->string('acronym');
            $table->string('website');
            $table->string('avatar')->default('avatar.jpg');
            $table->boolean('is_active')->default(1);
            $table->string('region_code');
            $table->foreign('region_code')->references('code')->on('location_regions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_agencies');
    }
};
