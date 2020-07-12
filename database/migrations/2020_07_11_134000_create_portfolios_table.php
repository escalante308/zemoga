<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->increments('idportfolio');
            $table->string('description', 255)->nullable();
            $table->string('image_url', 255)->nullable();
            $table->string('twitter_user_name', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->string('imageURL', 255)->nullable();
            $table->string('twitterUserName', 255)->nullable();
            $table->string('imag_url', 255)->nullable();
            $table->timestamps(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
}
