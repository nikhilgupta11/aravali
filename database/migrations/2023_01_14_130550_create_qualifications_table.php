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
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('exam_name');
            $table->string('subject_name');
            $table->string('bord_university');
            $table->string('roll_no');
            $table->string('result');
            $table->integer('passing_year');
            $table->float('percentage');
            $table->bigInteger('user_id');
            $table->text('marksheet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qualifications');
    }
};
