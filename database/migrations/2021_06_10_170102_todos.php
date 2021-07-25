<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Todos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            Schema::create('todos', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('start_place');
                $table->date('from_date');
                $table->date('to_date');
                $table->decimal('price');
                
                $table->string('status');
                $table->string('transport');
                $table->string('type');
                $table->string('image');
                $table->timestamps();
    
            });
        }
    }
//https://allaravel.com/blog/todo-list-nhap-du-lieu-mau-voi-factory-va-seeding
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('travels');
    }
}
