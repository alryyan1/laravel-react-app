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
        Schema::create('labrequests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('main_test_id')->index('mantest_fk_id')->unsigned();
            $table->unsignedBigInteger('pid')->index('pid_patients_id_fk');
            $table->integer('hidden')->default(1);
            $table->integer('is_lab2lab')->default(0);
            $table->integer('valid')->default(1);
            $table->integer('no_sample')->default(0);
            $table->double('price', 10, 1)->default(0);
            $table->double('amount_paid', 10, 1)->default(0);
            $table->integer('discount_per')->default(0);
            $table->integer('is_bankak')->default(0);
            $table->text('comment')->nullable();
            $table->foreignIdFor(\App\Models\User::class,'user_requested')->nullable()->constrained()->references('id')->on('users');
            $table->foreignIdFor(\App\Models\User::class,'user_deposited')->nullable()->constrained()->references('id')->on('users');

            $table->unique(['main_test_id', 'pid'], 'uniqe_pid_maintest_requests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labrequests');
    }
};
