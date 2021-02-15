<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailskitchenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_kitchen',function(Blueprint $table){
            $table->increments('id');
            $table->integer('kitchen_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->double('quantity_kitchen');
            $table->boolean('status');
            $table->timestamps();
            
            
            $table->foreign('kitchen_id')
                    ->references('id')
                    ->on('kitchens')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            
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
        //
    }
}
