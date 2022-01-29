<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referitems', function (Blueprint $table) {
            $table->id();
            $table->integer('refer_id');
            $table->integer('product_id');
            $table->integer('user_id');
            $table->float('comission');
            $table->float('sale_price');
            $table->integer('product_price');
            $table->integer('product_qty');
            $table->string('status');
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
        Schema::dropIfExists('referitems');
    }
}
