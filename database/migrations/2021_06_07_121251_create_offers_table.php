<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file');
            $table->decimal('offered_price');
            $table->longText('description');
//            $table->enum('status',app\Models\User::$status);
            $table->unsignedbigInteger('user_id');
            $table->unsignedbigInteger('order_id');

            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('NO ACTION')->onUpdate('NO ACTION');

            $table->foreign('order_id')->references('id')
                ->on('orders')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->softDeletes();
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
        Schema::dropIfExists('offers');
    }
}
