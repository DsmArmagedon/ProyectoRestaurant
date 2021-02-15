<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases',function(Blueprint $table){
            $table->increments('id');
            $table->string('quantity')->unique();
            $table->integer('product_id')->unsigned();
            $table->date('date_purchase');
            $table->string('description')->nullable();
            $table->boolean('status');
            $table->timestamps();
            
            
            $table->foreign('product_id')
                    ->references('id')
                    ->on('products')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('purchases');
    }
}
