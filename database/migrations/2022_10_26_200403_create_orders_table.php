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
            $table->id();
            $table->integer("user_id");
            $table->integer("product_id");
            $table->integer("transaction_id");
            $table->integer("qty")->default(0);
            $table->integer("price")->default(0);
            $table->integer("total")->default(0);
            $table->integer("status")->default(0)->comment("0: pending, 1: inprocess, 2: completed");
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
