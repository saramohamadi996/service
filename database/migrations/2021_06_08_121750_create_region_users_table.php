<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region_users', function (Blueprint $table) {
            $table->unsignedbigInteger('user_id');
            $table->unsignedbigInteger('region_id');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('NO ACTION')->onUpdate('NO ACTION');

            $table->foreign('region_id')->references('id')->on('regions')
                ->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('region_users');
    }
}
