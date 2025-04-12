<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifySkillLogoToProgressBarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('progress_bar', function (Blueprint $table) {
            if (!Schema::hasColumn('progress_bar', 'skill_logo')) {
                $table->string('skill_logo')->nullable()->after('slug');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('progress_bar', function (Blueprint $table) {
            $table->dropColumn('skill_logo');
        });
    }
}

