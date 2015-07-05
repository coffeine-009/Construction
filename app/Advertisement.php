<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Advertisements
 * @package App
 */
class Advertisement extends Model {

    /// *** Properties  *** ///
    private $attachment;


    /**
     * Access to attachment of advertisement.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attachment() {
        return $this -> belongsTo( 'App\Attachment', 'id_attachment');
    }

    /**
     * @return mixed
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * @param mixed $attachment
     */
    public function setAttachment( $attachment )
    {
        $this->attachment = $attachment;
    }
}
