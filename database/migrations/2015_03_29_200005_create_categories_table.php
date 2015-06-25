<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table)
		{
			$table -> increments('id');
            $table
				-> integer( 'id_parent_category' )
				-> unsigned()
				-> nullable();
            $table -> string( 'title' );
            $table -> string( 'description' );
			$table -> timestamps();

            $table -> foreign('id_parent_category')
                -> references( 'id' )
                -> on( 'categories' );
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories');
	}

}
