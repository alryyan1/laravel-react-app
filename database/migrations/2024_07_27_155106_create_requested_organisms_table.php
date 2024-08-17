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
        Schema::create('requested_organisms', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\LabRequest::class);
            $table->string('organism');
            $table->string('sensitive');
            $table->string('resistant');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requested_organisms');
    }
};
