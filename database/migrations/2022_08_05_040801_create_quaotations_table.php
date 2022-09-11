<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quaotations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('drugs');
            $table->integer('quanity')->default(0);
            $table->decimal('amount', 5, 2);
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('total', 5, 2)->nullable();
            $table->timestamps();

            $table->foreign('drugs')->references('id')->on('medicines');
            $table->foreign('order_id')->references('id')->on('precription_models');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quaotations');
    }
};
