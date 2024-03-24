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
        Schema::create('qualifiers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('spas_id')->unique();
            $table->string('school')->nullable();
            $table->string('course')->nullable();
            $table->string('region')->nullable()->constrained();
            $table->foreign('region')->references('code')->on('location_regions')->onDelete('cascade');
            $table->year('qualified_year');
            $table->tinyInteger('program_id')->unsigned()->index();
            $table->foreign('program_id')->references('id')->on('list_programs')->onDelete('cascade');
            $table->tinyInteger('subprogram_id')->unsigned()->index();
            $table->foreign('subprogram_id')->references('id')->on('list_programs')->onDelete('cascade');
            $table->tinyInteger('status_id')->unsigned()->index();
            $table->foreign('status_id')->references('id')->on('list_statuses')->onDelete('cascade');
            $table->tinyInteger('status_type')->unsigned()->index();
            $table->foreign('status_type')->references('id')->on('list_statuses')->onDelete('cascade');
            $table->boolean('is_undergrad')->default(0);
            $table->boolean('is_completed')->default(0);
            $table->boolean('is_endorsed')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qualifiers');
    }
};
