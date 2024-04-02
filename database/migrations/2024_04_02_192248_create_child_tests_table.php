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
            $table->string('child_test_name', 70);
            $table->double('low', null, 0)->nullable();
            $table->double('upper', null, 0)->nullable();
            $table->integer('main_id')->index('main_id_fk');
            $table->integer('child_test_id', true);
            $table->string('defval', 80);
            $table->integer('Unit')->nullable()->index('unit_fk');
            $table->text('normalRange');
            $table->boolean('mulit_range')->default(false);
            $table->decimal('max', 10);
            $table->decimal('lowest', 10);
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
