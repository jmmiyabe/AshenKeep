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
        Schema::create('applicant', function (Blueprint $table) {
            $table->id();  // Primary key
 
            // Personal Details
            $table->string('full_name');
            $table->text('permanent_address');
            $table->text('current_address');
            $table->text('provincial_address');
            $table->string('email')->unique();
            $table->string('landline_number')->nullable();
            $table->string('mobile_number');
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->string('citizenship');
            $table->string('place_of_catholic_baptism');
            $table->date('date_of_catholic_baptism');
            $table->string('religious_organization_affiliated_with');
            $table->string('donors_occupation');
            $table->string('employers_name_or_business_name');
            $table->text('business_address');
            $table->string('employers_email_or_business_email_address');
            $table->string('business_landline_number')->nullable();
            $table->string('business_mobile_number')->nullable();
            $table->string('position');
            $table->integer('years_in_employment_or_business');
 
            // Spouse's Information
            $table->string('spouses_name')->nullable();
            $table->date('spouses_date_of_birth')->nullable();
            $table->string('spouses_place_of_birth')->nullable();
            $table->string('spouses_email_address')->nullable();
            $table->string('spouses_landline_number')->nullable();
            $table->string('spouses_mobile_number')->nullable();
 
            // Father's Information
            $table->string('fathers_name');
            $table->string('fathers_email_address')->nullable();
            $table->string('fathers_landline_number')->nullable();
            $table->string('fathers_mobile_number')->nullable();
 
            // Mother's Information
            $table->string('mothers_name');
            $table->string('mothers_email_address')->nullable();
            $table->string('mothers_landline_number')->nullable();
            $table->string('mothers_mobile_number')->nullable();
 
            // Timestamps
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant');
    }
};