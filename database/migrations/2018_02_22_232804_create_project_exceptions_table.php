<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectExceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_exceptions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->string('status_code')->nullable();
            $table->string('enviroment')->nullable();
            $table->text('url')->nullable();
            $table->text('message')->nullable();
            $table->text('headers')->nullable();
            $table->text('stack_trace')->nullable();
            $table->string('browser')->nullable();
            $table->string('os')->nullable();
            $table->text('request_url')->nullable();
            $table->string('level')->nullable();
            $table->text('file')->nullable();
            $table->string('line_number')->nullable();
            $table->text('request_uri')->nullable();
            $table->text('server_name')->nullable();
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
        Schema::dropIfExists('project_exceptions');
    }
}
