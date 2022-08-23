<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('value')->nullable();
            $table->decimal('amount')->nullable();

            $table->unsignedbigInteger('item_id')->nullable();
            $table->unsignedbigInteger('attribute_id');
            $table->unsignedbigInteger('order_id');

            $table->foreign('item_id')->references('id')->on('items')
                ->onDelete('NO ACTION')->onUpdate('NO ACTION');

            $table->foreign('attribute_id')->references('id')->on('attributes')
                ->onDelete('NO ACTION')->onUpdate('NO ACTION');

            $table->foreign('order_id')->references('id')->on('orders')
                ->onDelete('NO ACTION')->onUpdate('NO ACTION');

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
        Schema::dropIfExists('order_items');
    }
}
