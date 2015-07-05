<?php
/**
 * @copyright (c) 2015 by Vitaliy Tsutsman
 *
 * @author Vitaliy Tsutsman <vitaliyacm@gmail.com>
 */

namespace App;


/**
 * Class AttachmentObserver
 * @package App
 */
class AttachmentObserver {

    /**
     * Set file name.
     *
     * @param $model
     */
    public function saving( $model ) {

        $model -> title = 'Advertisement';
        $model -> file_name = $model -> getFile() -> getClientOriginalName();
    }

    /**
     * Copy file.
     *
     * @param $model
     */
    public function saved( $model ) {
        //- Prepare storage -//
        $path = public_path() . '/files/images/';

        //- Save file -//
        $model -> getFile() -> move(
            $path,
            $model -> getFile() -> getClientOriginalName()
        );
    }
}