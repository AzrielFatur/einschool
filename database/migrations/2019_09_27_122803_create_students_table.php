<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('grade_id');
            $table->integer('nis', 10);
            $table->string('name');
            $table->string('date_of_birth');
            $table->string('gender');
            $table->string('religion');
            $table->string('email', 191)->unique();
            $table->integer('phone_number', 16);
            $table->string('address');
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
        Schema::dropIfExists('students');
    }
}
