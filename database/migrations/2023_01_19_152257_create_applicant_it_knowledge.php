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
        Schema::create('applicant_it_knowledge', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('exam_name');
            $table->string('board_name');
            $table->string('passing_year');
            $table->text('marksheet');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicant_it_knowledge');
    }
};
