<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name');
            $table->string('course_and_section');
            $table->string('email');
            $table->string('contact_no');
            $table->string('description');
            $table->text('platform');
            $table->unsignedBigInteger('officer_id');
            $table->foreign('officer_id')->references('id')->on('officers');
            $table->unsignedBigInteger('partylist_id');
            $table->foreign('partylist_id')->references('id')->on('partylists');
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
        Schema::dropIfExists('candidates');
    }
}
