<?php

use App\Models\Shift;
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
        Schema::create('costs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Shift::class)->constrained();
            $table->foreignIdFor(\App\Models\User::class,'user_cost')->nullable()->constrained()->references('id')->on('users');
            $table->foreignIdFor(\App\Models\DoctorShift::class)->nullable()->constrained();
            $table->string('description')->nullable();
            $table->string('comment')->nullable();
            $table->integer('amount');
            $table->unique(['doctor_shift_id', 'shift_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cost');
    }
};
