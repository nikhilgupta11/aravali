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
        Schema::create('job_applicants', function (Blueprint $table) {
            $table->id();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->string('gender');
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('email');
            $table->date('birth_date');
            $table->integer('age');
            $table->integer('category');
            $table->string('martial_status');
            $table->bigInteger('mobile_no');
            $table->bigInteger('aadhar_no');
            $table->text('correspondence_address');
            $table->text('parmanent_address');
            $table->integer('nationality');
            $table->integer('state');
            $table->integer('district');
            $table->boolean('declaration');
            $table->text('signature');
            $table->text('image');
            $table->integer('job_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_applicants');
    }
};
