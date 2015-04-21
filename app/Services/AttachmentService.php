<?php
/**
 * @copyright 2015 (c), by Vitaliy Tsutsman
 *
 * @author Vitaliy Tsutsman <vitaliyacm@gmail.com>
 */

namespace App\Services;

/**
 * Interface AttachmentService
 * Service for work with attachments.
 *
 * @package App\Services
 */
interface AttachmentService {

    /**
     * Delete attachment.
     *
     * @param $id   ID of attachment
     *
     * @return void
     */
    public function delete( $id );
}