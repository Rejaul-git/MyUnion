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
        Schema::create('birth_certificates', function (Blueprint $table) {
            $table->id();
            $table->string('applicant_name_bn');
            $table->string('applicant_name_en');
            $table->string('father_name_bn');
            $table->string('father_name_en');
            $table->string('mother_name_bn');
            $table->string('mother_name_en');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('birth_registration_number')->nullable();
            $table->string('birth_place');
            $table->string('district');
            $table->string('upazila');
            $table->string('union');
            $table->string('mobile_number');
            $table->string('email')->nullable();
            $table->text('present_address');
            $table->string('photo_path')->nullable();
            $table->string('nid_path')->nullable();
            $table->string('birth_registration_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('birth_certificates');
    }
};