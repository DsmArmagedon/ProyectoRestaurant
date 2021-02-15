<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailssaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_sale',function(Blueprint $table){
            $table->increments('id');
            $table->integer('sale_id')->unsigned();
            $table->integer('plate_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->double('price_unit')->unsigned();
            $table->boolean('status');
            $table->timestamps();
            
            $table->foreign('sale_id')
                    ->references('id')
                    ->on('sales')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            
            $table->foreign ('plate_id')
                    ->references('id')
                    ->on('plates')
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
        Schema::drop('details_sale');
    }
}
