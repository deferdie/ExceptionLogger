<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusCodeNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_code_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('status_code_id');
            $table->boolean('can_email')->default(false);
            $table->boolean('can_slack')->default(false);
            $table->boolean('can_sms')->default(false);
            $table->string('email')->nullable();
            $table->string('slack_channel')->nullable();
            $table->string('sms_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_code_notifications');
    }
}
