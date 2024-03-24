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
        Schema::create('qualifier_deferments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('reason');
            $table->year('availed_year')->nullable();
            $table->string('file')->nullable();
            $table->boolean('is_availing')->default(0);
            $table->boolean('is_seened')->default(0);
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
        Schema::dropIfExists('qualifier_deferments');
    }
};
