<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('image');
            $table->integer('commission');
            $table->decimal('base_price');
            $table->decimal('approved_price');
            $table->string('meta_description')->nullable();
            $table->string('slug')->nullable();
            $table->integer('priority');
            $table->longText('description')->nullable();
            $table->enum('status',Service\Service\Models\Service::$statuses)->default('waiting');

            $table->unsignedbigInteger('category_id')->unsigned();

            $table->foreign('category_id')->references('id')
                ->on('categories')->onDelete('CASCADE')->onUpdate('NO ACTION');
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
        Schema::dropIfExists('services');
    }
}
