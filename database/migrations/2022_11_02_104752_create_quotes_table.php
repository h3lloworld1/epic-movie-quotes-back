<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quotes', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreignId('movie_id')->references('id')->on('movies')->onDelete('cascade');
			$table->json('body');
			$table->string('thumbnail');
			$table->timestamps();
			$table->timestamp('published_at')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('quotes');
	}
};
