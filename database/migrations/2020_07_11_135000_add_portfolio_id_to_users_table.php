<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPortfolioIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('idportfolio')->nullable();

            $table->foreign('idportfolio')->references('idportfolio')->on('portfolios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
 
            if (Schema::hasColumn('users', 'idportfolio')) {
                $table->dropForeign(['idportfolio']);
                $table->dropColumn('idportfolio');
            }

        });
    }
}
