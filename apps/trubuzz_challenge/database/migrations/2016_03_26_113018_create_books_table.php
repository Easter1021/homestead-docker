<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('books', function(Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->integer('user_id');
                $table->text('description');
                $table->timestamp('created_time');
                $table->timestamp('updated_time');

                $table->index(['user_id', 'title']);

            });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('books');
    }

}
