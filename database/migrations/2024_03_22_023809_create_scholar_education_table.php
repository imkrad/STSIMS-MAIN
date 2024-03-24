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
        Schema::create('scholar_education', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->integer('school_id')->unsigned()->nullable();
            $table->foreign('school_id')->references('id')->on('school_campuses')->onDelete('cascade');
            $table->integer('course_id')->unsigned()->nullable();
            $table->foreign('course_id')->references('id')->on('list_courses')->onDelete('cascade');
            $table->tinyInteger('level_id')->unsigned()->nullable();
            $table->foreign('level_id')->references('id')->on('list_dropdowns')->onDelete('cascade');
            $table->tinyInteger('award_id')->unsigned()->nullable();
            $table->foreign('award_id')->references('id')->on('list_dropdowns')->onDelete('cascade');
            $table->year('graduated_year')->nullable();
            $table->boolean('is_enrolled')->default(0);
            $table->boolean('is_shiftee')->default(0);
            $table->boolean('is_transferee')->default(0);
            $table->boolean('is_completed')->default(0);
            $table->bigInteger('scholar_id')->unsigned()->index();
            $table->foreign('scholar_id')->references('id')->on('scholars')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholar_education');
    }
};
