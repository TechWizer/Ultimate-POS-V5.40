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
        Schema::table('business', function (Blueprint $table) {
            $table->integer('manufacturing')->nullable();
            $table->integer('essential')->nullable();
            $table->integer('repair')->nullable();
            $table->integer('woocommerce')->nullable();
            $table->integer('accounting')->nullable();
            $table->integer('enable_vat')->nullable();
            $table->integer('product_catelogue')->nullable();
            $table->integer('shop_module')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business', function (Blueprint $table) {
            //
        });
    }
};
