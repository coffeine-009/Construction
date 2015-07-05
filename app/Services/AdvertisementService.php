<?php
/**
 * @copyright (c) 2015 by Vitaliy Tsutsman
 *
 * @author Vitaliy Tsutsman <vitaliyacm@gmail.com>
 */

namespace App\Services;

use App\Advertisement;

/**
 * Interface AdvertisementService
 * @package App\Services
 */
interface AdvertisementService {

    /**
     * Find all.
     *
     * @return mixed
     */
    public function findAll();

    /**
     * Create a new Ad.
     *
     * @param Advertisement $advertisement
     *
     * @return mixed
     */
    public function create( Advertisement $advertisement );

    /**
     * Find.
     *
     * @param $id   ID of Ad
     *
     * @return mixed
     */
    public function find( $id );

    /**
     * Update Ad.
     *
     * @param Advertisement $advertisement
     *
     * @return mixed
     */
    public function update( Advertisement $advertisement );

    /**
     * Delete Ad.
     *
     * @param $id   ID of Ad
     *
     * @return mixed
     */
    public function delete( $id );
}
