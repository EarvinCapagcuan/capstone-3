<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_name');
            $table->unsignedInteger('student_id');
            $table->foreign('student_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedInteger('instructor_id');
            $table->foreign('instructor_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedInteger('batch_id');
            $table->foreign('batch_id')->references('id')->on('batches')->onUpdate('cascade')->onDelete('restrict');
            $table->string('project_req');
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
        Schema::dropIfExists('projects');
    }
}
