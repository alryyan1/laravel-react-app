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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_header')->default(0);
            $table->boolean('is_footer')->default(0);
            $table->boolean('is_logo')->default(0);
            $table->longText('header_base64')->nullable();
            $table->longText('footer_base64')->nullable();
            $table->string('header_content')->nullable();
            $table->string('footer_content')->nullable();
            $table->longText('logo_base64')->nullable();
            $table->string('lab_name')->nullable();
            $table->string('hospital_name')->nullable();
            $table->string('inventory_notification_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
