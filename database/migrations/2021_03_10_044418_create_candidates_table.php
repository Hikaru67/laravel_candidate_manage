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
            $table->string('firstName', 100);
            $table->string('lastName', 100);
            $table->tinyInteger('position');
            $table->tinyInteger('origin');
            $table->string('dateReceived')->default(now());
            $table->tinyInteger('filtered')->default(FILTERED_PENDING);
            $table->string('dateInterview')->nullable();
            $table->tinyInteger('interviewed')->default(INTERVIEW_PENDING);
            $table->text('cv');
            $table->text('note')->nullable();
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
