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
        Schema::create('qualifier_endorsements', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->boolean('is_approved')->default(0);
            $table->boolean('is_seened')->default(0);
            $table->string('endorsed_to');
            $table->foreign('endorsed_to')->references('code')->on('location_regions')->onDelete('cascade');
            $table->string('endorsed_by');
            $table->foreign('endorsed_by')->references('code')->on('location_regions')->onDelete('cascade');
            $table->integer('school_id')->unsigned()->nullable();
            $table->foreign('school_id')->references('id')->on('school_campuses')->onDelete('cascade');
            $table->integer('course_id')->unsigned()->nullable();
            $table->foreign('course_id')->references('id')->on('list_courses')->onDelete('cascade');
            $table->bigInteger('qualifier_id')->unsigned()->index();
            $table->foreign('qualifier_id')->references('id')->on('qualifiers')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qualifier_endorsements');
    }
};
