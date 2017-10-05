<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_order');
            $table->float('total');
            $table->string('order_address');
            $table->string('note');
            $table->enum('status',['0','1']);// trạng thái đã giao hàng chưa
            $table->timestamps();
            $table->integer('user_id')->unsigned()->nullable(); //unsigned:Không âm; nullable:ko rỗng;
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
        Schema::dropIfExists('bills');
    }
}
