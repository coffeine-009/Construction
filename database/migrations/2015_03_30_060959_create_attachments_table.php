<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachmentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema :: create( 'attachments', function ( Blueprint $table ) {
            $table -> increments( 'id' );
            $table -> integer( 'id_item', false, true );
            $table -> string( 'title' );
            $table -> string( 'file_name' );
            $table -> timestamps();
        } );

        Schema :: table( 'advertisements', function ( $table ) {
            $table -> foreign( 'id_attachment' )
                -> references( 'id' )
                -> on( 'attachments' );
        } );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop( 'attachments' );
    }

}
