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
            $table->string("user_name");
            $table->string("user_email");
            $table->string("product_name");
            $table->integer("product_price")->default(0);
            $table->integer("qty")->default(0);
            $table->integer("total")->default(0);
            $table->integer("status")->default(0)->comment("0: pending, 1: inprocess, 2: completed");
            $table->integer("transaction_status")->default(0)->comment("0: unpaid, 1: partial, 2: paid");
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
