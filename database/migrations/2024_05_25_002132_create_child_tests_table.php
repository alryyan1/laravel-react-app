<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_tests', function (Blueprint $table) {
            $table->id();
            $table->string('child_test_name', 70);
            $table->double('low', null, 0)->nullable();
            $table->double('upper', null, 0)->nullable();
            $table->foreignIdFor(\App\Models\MainTest::class);
//            $table->integer('child_test_id', true);
            $table->text('defval')->default('');
            $table->foreignIdFor(\App\Models\Unit::class)->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('normalRange')->default('');
            $table->decimal('max')->nullable();
            $table->decimal('lowest')->nullable();
            $table->integer('test_order')->nullable();
            $table->foreignIdFor(\App\Models\childGroup::class)->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('child_tests');
    }
};
