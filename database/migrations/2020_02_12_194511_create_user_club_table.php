<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserClubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_club', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('club_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('club_id')->references('id')->on('clubs');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_club');
    }
}
