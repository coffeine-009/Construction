<?php
/**
 * @copyright (c) 2015 by Vitaliy Tsutsman
 *
 * @author Vitaliy Tsutsman <vitaliyacm@gmail.com>
 */

namespace App\Services\Implementation;


use App\Advertisement;
use App\Services\AdvertisementService;
use App\Services\AttachmentService;
use App\Services\ID;
use Illuminate\Support\Facades\DB;

/**
 * Class AdvertisementServiceImpl
 * @package App\Services\Implementation
 */
class AdvertisementServiceImpl implements AdvertisementService {

    /// *** Properties  *** ///
    private $attachmentService;


    /// *** Methods     *** ///
    public function __construct( AttachmentService $attachmentService ) {
        //- Inject dependencies -//
        $this -> attachmentService = $attachmentService;
    }

    /**
     * Find all.
     *
     * @return mixed
     */
    public function findAll()
    {
        return Advertisement :: all();
    }

    /**
     * Create a new Ad.
     *
     * @param Advertisement $advertisement
     *
     * @return mixed
     */
    public function create( Advertisement $advertisement )
    {
        DB :: beginTransaction();

        try {
            $advertisement -> getAttachment() -> save();

            $advertisement -> id_attachment = $advertisement -> getAttachment() -> id;

            $advertisement -> save();

            DB:: commit();

            return $advertisement;
        } catch ( \Exception $e ) {
            // Rollback
            DB :: rollback();
        }

        return null;
    }

    /**
     * Find.
     *
     * @param $id   ID of Ad
     *
     * @return mixed
     */
    public function find( $id )
    {
        return Advertisement :: find( $id );
    }

    /**
     * Update Ad.
     *
     * @param Advertisement $advertisement
     *
     * @return mixed
     */
    public function update( Advertisement $advertisement )
    {

    }

    /**
     * Delete Ad.
     *
     * @param $id   ID of Ad
     *
     * @return mixed
     */
    public function delete( $id )
    {
        // TODO: Implement delete() method.
    }
}