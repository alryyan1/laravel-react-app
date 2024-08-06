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
        Schema::table('patients', function (Blueprint $table) {
            $table->text('present_complains');
            $table->text('history_of_present_illness');
            $table->string('procedures');
            $table->string('provisional_diagnosis');
            $table->string('bp');
            $table->float('temp');
            $table->float('weight');
            $table->float('height');
            $table->boolean('juandice')->nullable()->default(null);
            $table->boolean('pallor')->nullable()->default(null);;
            $table->boolean('clubbing')->nullable()->default(null);;
            $table->boolean('cyanosis')->nullable()->default(null);;
            $table->boolean('edema_feet')->nullable()->default(null);;
            $table->boolean('dehydration')->nullable()->default(null);;
            $table->boolean('lymphadenopathy')->nullable()->default(null);;
            $table->boolean('peripheral_pulses')->nullable()->default(null);;
            $table->boolean('feet_ulcer')->nullable()->default(null);;
            $table->foreignIdFor(\App\Models\Country::class)->nullable();
            $table->string('gov_id')->nullable();
            $table->string('prescription_notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('present_complains');
            $table->dropColumn('history_of_present_illness');
            $table->dropColumn('procedures');
            $table->dropColumn('provisional_diagnosis');
            $table->dropColumn('bp');
            $table->dropColumn('temp');
            $table->dropColumn('weight');
            $table->dropColumn('height');
            $table->dropColumn('jaundice');
            $table->dropColumn('pallor');
            $table->dropColumn('clubbing');
            $table->dropColumn('cyanosis');
            $table->dropColumn('edema_feet');
            $table->dropColumn('dehydration');
            $table->dropColumn('lymphadenopathy');
            $table->dropColumn('peripheral_pulses');
            $table->dropColumn('feet_ulcer');
            $table->dropColumn(\App\Models\Country::class)->nullable();
            $table->dropColumn('gov_id');
        });
    }
};
