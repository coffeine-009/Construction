<?php
/**
 * Created by PhpStorm.
 * User: vitaliy
 * Date: 4/4/15
 * Time: 2:51 PM
 */

namespace App\Services;


interface ItemService {

    public function findAll();

    public function findByCategory($id);

    public function create(
        $attachments,
        $categoryId,
        $title,
        $description
    );

    public function find($id);

    public function update(
        $id,
        $attachments,
        $categoryId,
        $title,
        $description
    );

    /**
     * Delete
     *
     * @param $id   ID of Item
     *
     * @return void
     */
    public function delete( $id );
}