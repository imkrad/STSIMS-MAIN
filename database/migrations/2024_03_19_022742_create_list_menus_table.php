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
        Schema::create('list_menus', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->tinyIncrements('id');
            $table->string('name',100);
            $table->string('icon',20)->nullable();   
            $table->string('route',150)->nullable();   
            $table->string('path',150)->nullable();   
            $table->string('group',100)->nullable();
            $table->integer('order');
            $table->boolean('has_child')->default(0);
            $table->boolean('is_mother');
            $table->boolean('is_active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_menus');
    }
};
