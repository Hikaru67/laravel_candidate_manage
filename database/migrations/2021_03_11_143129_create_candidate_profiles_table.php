<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email', 255);
            $table->string('phone', 20);
            $table->tinyInteger('gender')->default(0);
            $table->foreignId('position_id')->constrained('positions')->onDelete('cascade');
            $table->foreignId('source_id')->constrained('sources')->onDelete('cascade');
            $table->string('received_date')->default(now());
            $table->tinyInteger('filtered_result')->default(FILTERED_PENDING);
            $table->string('interview_date')->nullable();
            $table->string('work_date')->nullable();
            $table->text('feedback')->nullable();
            $table->tinyInteger('interview_result')->default(INTERVIEW_PENDING);
            $table->text('cv_link');
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
        Schema::dropIfExists('candidate_profiles');
    }
}
