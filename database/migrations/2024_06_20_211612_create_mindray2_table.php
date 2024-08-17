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
        Schema::create('mindray2', function (Blueprint $table) {
            $table->id();
            $table->integer('pid');
            $table->float('pho', 10, 1);
            $table->float('mg', 10);
            $table->float('ca', 10);
            $table->integer('gluh');
            $table->float('tb', 10, 1);
            $table->float('db', 10, 1);
            $table->integer('alt');
            $table->integer('ast');
            $table->float('crp', 10, 1);
            $table->integer('alp');
            $table->float('tp', 10, 1);
            $table->float('alb', 10, 1);
            $table->integer('tg');
            $table->integer('ldl');
            $table->integer('hdl');
            $table->integer('tc');
            $table->float('crea', 10, 1);
            $table->float('uric', 10, 1);
            $table->integer('urea');
            $table->float('ckmb', 10);
            $table->float('ck', 10);
            $table->float('ldh', 10);
            $table->float('fe', 10);
            $table->float('fer', 10);
            $table->integer('glug');
            $table->float('ddimer', 10);
            $table->float('amylase', 10);
            $table->float('lipase', 10);
            $table->integer('aso');
            $table->float('tibc', 10);
            $table->float('acr', 10);
            $table->float('pcr', 10);
            $table->decimal('hb', 10);
            $table->float('na', 10);
            $table->float('k', 10);
            $table->float('c1', 10);
            $table->float('c2', 10);
            $table->string('ggt', 200);
            $table->string('a1c', 200);
            $table->string('iron', 200);
            $table->string('tpc3', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mindray2');
    }
};
