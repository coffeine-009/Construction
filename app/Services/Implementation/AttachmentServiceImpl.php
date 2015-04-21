<?php
/**
 * @copyright 2015 (c), by Vitaliy Tsutsman
 *
 * @author Vitaliy Tsutsman <vitaliyacm@gmail.com>
 */

namespace App\Services\Implementation;


use App\Attachment;
use App\Services\AttachmentService;

/**
 * Class AttachmentServiceImpl.
 * Implementation of AttachmentService.
 * @see App\Services\AttachmentService
 *
 * @package App\Services\Implementation
 */
class AttachmentServiceImpl implements AttachmentService {

    /**
     * Delete attachment.
     *
     * @param $id   ID of attachment
     *
     * @return void
     */
    public function delete( $id )
    {
        $attachment = Attachment :: find( $id );

        if ( !$attachment ) return;

        //- Prepare storage -//
        $path = public_path() . '/files/' .
            $attachment -> item() -> first() -> category_id . '/' .
            $attachment -> item() -> first() -> id . '/';

        Attachment :: destroy( $id );

        unlink( $path . $attachment -> file_name );
    }
}