<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema :: create( 'advertisements', function ( Blueprint $table ) {
            $table -> increments( 'id' );
            $table
                -> integer( 'id_attachment' )
                -> unsigned()
                -> unique();
            $table -> string( 'message' );
            $table -> timestamps();
        });

        Schema :: table( 'advertisements', function( $table ) {
            $table -> foreign( 'id_attachment' )
                -> references( 'id' )
                -> on( 'attachments' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('advertisements');
    }
}
