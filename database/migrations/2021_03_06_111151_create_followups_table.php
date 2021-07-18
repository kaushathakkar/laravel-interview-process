<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followups', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('candidate_id');          
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('opening_id');            
            $table->string('interview_round');
            $table->enum('status',['Active', 'Inactive']);
            $table->text('notes');
            $table->timestamps();

            $table->foreign('candidate_id')->references('id')->on('candidates');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('followups');
    }
}
