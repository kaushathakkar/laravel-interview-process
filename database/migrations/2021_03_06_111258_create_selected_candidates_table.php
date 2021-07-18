<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectedCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selected_candidates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('opening_id');
            $table->string('offered_ctc');
            $table->dateTime('joining', $precision = 0);
            $table->timestamps();

            $table->foreign('candidate_id')->references('id')->on('candidates');
            //$table->foreign('opening_id')->references('id')->on('openings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('selected_candidates');
    }
}
