<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectTaskLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('project_task_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_task_id')->unsigned();
            $table->foreign('project_task_id')->references('id')->on('project_tasks');
            $table->string('action')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_task_logs');
    }
}
