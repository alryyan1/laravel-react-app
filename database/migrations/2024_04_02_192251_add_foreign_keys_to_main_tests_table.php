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
        Schema::table('main_tests', function (Blueprint $table) {
            $table->foreign(['container_id'], 'cntainer_fk')->references(['id'])->on('containers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['pack_id'], 'pakid_FK')->references(['package_id'])->on('package')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('main_tests', function (Blueprint $table) {
            $table->dropForeign('cntainer_fk');
            $table->dropForeign('pakid_FK');
        });
    }
};
