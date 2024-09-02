<?php

use App\Models\Employee;
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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->text('phone');
            $table->text('email');
            $table->double('salary');
            $table->boolean('is_manager')->default(false);
            $table->text('job_position')->nullable();
            $table->date('first_contract_date')->nullable();
            $table->text('working_hours')->nullable();
            $table->foreignIdFor(\App\Models\Department::class)->nullable()->constrained();
            $table->longText('resume')->nullable();
            $table->text('address')->nullable();
            $table->text('language')->nullable();
            $table->text('home_work_distance')->nullable();
            $table->text('martial_status')->nullable();
            $table->integer('number_of_children')->nullable();
            $table->text('emergency_contact_name')->nullable();
            $table->text('emergency_contact_phone')->nullable();
            $table->foreignIdFor(\App\Models\Country::class);
            $table->string('passport_no')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->boolean('non_resident')->default(false);
            $table->foreignIdFor(\App\Models\User::class)->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
