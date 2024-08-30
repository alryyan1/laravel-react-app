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
        Schema::create('hormone', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('pid', 11);
            $table->float('tsh', 10);
            $table->float('t3', 10);
            $table->float('t4', 10);
            $table->float('fsh', 10);
            $table->float('lh', 10);
            $table->float('prl', 10);
            $table->float('vitd', 10);
            $table->float('pth', 10);
            $table->float('psa', 10);
            $table->float('fpsa', 10);
            $table->float('ft3', 10);
            $table->float('ft4', 10);
            $table->float('ferr', 10);
            $table->float('folate', 10);
            $table->float('afp', 10);
            $table->float('ca153', 10);
            $table->float('ca199', 10);
            $table->float('ca125', 10);
            $table->float('amh', 10);
            $table->float('e2', 10);
            $table->float('prog', 10);
            $table->float('testo', 10);
            $table->float('bhcg', 10);
            $table->float('cortiso', 10);
            $table->float('cea', 10);
            $table->float('hiv', 10);
            $table->float('antihcv', 10);
            $table->float('trop', 10);
            $table->float('vb12', 10);
            $table->string('hbsag', 40);
            $table->string('ana', 10);
            $table->string('dsdna', 10);
            $table->float('ins', 10, 1);
            $table->float('cp', 10, 1);
            $table->string('antihbc', 10);
            $table->string('Anti_HBe', 10);
            $table->float('HBeAg', 10, 1);
            $table->float('ccp', 10, 1);
            $table->float('CK_MB', 10);
            $table->float('CMV_IgG', 10);
            $table->float('CMV_IgM', 10);
            $table->float('dimer', 10);
            $table->float('GH', 10);
            $table->float('HE4', 10);
            $table->float('HSV_IgG', 10);
            $table->float('HSV_IgM', 10);
            $table->string('IgA', 10);
            $table->string('IgE', 10);
            $table->string('IgG', 10);
            $table->string('IgM', 10);
            $table->float('PCT', 10);
            $table->float('Rubella_IgG', 10);
            $table->float('Rubella_IgM', 10);
            $table->float('TOXO_IgG', 10);
            $table->float('TOXO_IgM', 10);
            $table->float('acth', 10);
            $table->string('antihbs', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hormone');
    }
};
