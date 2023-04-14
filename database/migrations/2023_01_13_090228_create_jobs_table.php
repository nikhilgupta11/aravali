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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('country_id');
            $table->integer('state_id');
            $table->integer('district_id');
            $table->integer('department_id');
            $table->string('job_title');
            $table->integer('salary');
            $table->integer('no_of_post');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('status');
            $table->text('description');
            $table->string('experience');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};
