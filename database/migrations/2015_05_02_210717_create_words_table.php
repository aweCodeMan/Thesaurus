<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('words', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('word', 255);
            $table->string('pronunciation', 255);
            $table->text('tags');
            $table->text('definitions');
            $table->dateTime('hidden_at')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('words');
	}
}
