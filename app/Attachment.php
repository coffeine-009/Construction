<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model {

    /// **  Properties  *** ///
    /**
     * File(image).
     *
     * @var
     */
    private $file;


    /// *** Methods     *** ///
    /**
     * Item for this attachment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item() {
        return $this -> belongsTo( 'App\Item', 'id_item' );
    }


    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this -> file;
    }

    /**
     * @param $file
     */
    public function setFile( $file ) {
        $this -> file = $file;
    }
}
