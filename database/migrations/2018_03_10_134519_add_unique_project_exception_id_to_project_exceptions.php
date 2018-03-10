<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUniqueProjectExceptionIdToProjectExceptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_exceptions', function (Blueprint $table) {
            $table->unsignedInteger('project_unique_exception_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_exceptions', function (Blueprint $table) {
            $table->dropColumn('project_unique_exception_id');
        });
    }
}
