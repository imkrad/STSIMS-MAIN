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
        Schema::create('qualifier_addresses', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            // $table->string('district')->nullable();
            // $table->string('zipcode')->nullable();
            // $table->string('hs_school')->nullable();
            // $table->string('assigned_region')->nullable()->constrained();
            // $table->foreign('assigned_region')->references('code')->on('location_regions')->onDelete('cascade');
            $table->string('address')->nullable();
            $table->string('region_code')->nullable()->constrained();
            $table->foreign('region_code')->references('code')->on('location_regions')->onDelete('cascade');
            $table->string('province_code')->nullable()->constrained();
            $table->foreign('province_code')->references('code')->on('location_provinces')->onDelete('cascade');
            $table->string('municipality_code')->nullable()->constrained();
            $table->foreign('municipality_code')->references('code')->on('location_municipalities')->onDelete('cascade');
            $table->string('barangay_code')->nullable()->constrained();
            $table->foreign('barangay_code')->references('code')->on('location_barangays')->onDelete('cascade');
            $table->bigInteger('qualifier_id')->unsigned()->index();
            $table->foreign('qualifier_id')->references('id')->on('qualifiers')->onDelete('cascade');
            $table->boolean('is_completed')->default(0);
            $table->json('information');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qualifier_addresses');
    }
};
