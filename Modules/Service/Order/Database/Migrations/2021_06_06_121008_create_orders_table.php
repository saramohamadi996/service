<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->time('time');
            $table->date('date');
            $table->decimal('amount')->nullable();
            $table->string('digital_verification');
            $table->enum('status', Service\Order\Models\Order::$statuses)->default('waiting');

            $table->unsignedbigInteger('user_id');
            $table->unsignedbigInteger('service_id');
            $table->unsignedbigInteger('address_id');
            $table->unsignedbigInteger('specialist_id')->nullable();

            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('NO ACTION')->onUpdate('NO ACTION');

            $table->foreign('service_id')->references('id')
                ->on('services')->onDelete('NO ACTION')->onUpdate('NO ACTION');

            $table->foreign('specialist_id')->references('id')
                ->on('users')->onDelete('CASCADE');

            $table->foreign('address_id')->references('id')
                ->on('addresses')->onDelete('NO ACTION')->onUpdate('NO ACTION');
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
        Schema::dropIfExists('orders');
    }
}
