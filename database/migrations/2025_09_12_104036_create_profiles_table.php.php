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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Personal Information
            $table->string('name_en')->comment('Name in English');
            $table->string('name_bn')->comment('Name in Bangla');
            $table->string('father_name_en')->comment('Father name in English');
            $table->string('father_name_bn')->comment('Father name in Bangla');
            $table->string('mother_name_en')->comment('Mother name in English');
            $table->string('mother_name_bn')->comment('Mother name in Bangla');
            $table->string('spouse_name_en')->nullable()->comment('Spouse name in English');
            $table->string('spouse_name_bn')->nullable()->comment('Spouse name in Bangla');
            $table->string('email')->nullable();
            $table->string('mobile', 15);
            $table->date('birth_date');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->enum('marital_status', ['single', 'married', 'divorced', 'widowed'])->nullable();

            // Current Address
            $table->string('current_division');
            $table->string('current_district');
            $table->string('current_upazila');
            $table->string('current_union');
            $table->string('current_ward');
            $table->string('current_village');
            $table->string('current_post_office')->nullable();
            $table->string('current_post_code', 10)->nullable();
            $table->text('current_full_address');

            // Permanent Address
            $table->string('permanent_division');
            $table->string('permanent_district');
            $table->string('permanent_upazila');
            $table->string('permanent_union');
            $table->string('permanent_ward');
            $table->string('permanent_village');
            $table->string('permanent_post_office')->nullable();
            $table->string('permanent_post_code', 10)->nullable();
            $table->text('permanent_full_address');
            $table->boolean('same_as_current')->default(false);

            // Documents
            $table->string('photo_path')->nullable();
            $table->string('nid_path')->nullable();

            // Status
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('remarks')->nullable();

            $table->timestamps();

            // Indexes
            $table->index(['user_id', 'status']);
            $table->index('mobile');
            $table->index('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
