<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordRelationshipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('word_relationships', function (Blueprint $table)
        {
            $table->increments('id');
            $table->smallInteger('relationship_type')->unsigned();
            $table->integer('wordId')->unsigned();
            $table->foreign('wordId')
                  ->references('id')->on('words')
                  ->onDelete('cascade');

            $table->integer('linkedWordId')->unsigned();
            $table->foreign('linkedWordId')
                  ->references('id')->on('words')
                  ->onDelete('cascade');

            $table->softDeletes();
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
        Schema::drop('word_relationships');
	}
}
