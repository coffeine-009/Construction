<?php
/**
 * @copyright 2015 (c), by Vitaliy Tsutsman
 *
 * @author Vitaliy Tsutsman <vitaliyacm@gmail.com>
 */

namespace App\Services;

/**
 * Interface CategoryService.
 * Service for work with categories.
 *
 * @package App\Services
 */
interface CategoryService {

    /**
     * Find all.
     *
     * @return mixed
     */
    public function findAll();

    /**
     * Create.
     *
     * @param $parentId     ID of parent category
     * @param $title        Title of category
     * @param $description  Description of category
     *
     * @return mixed
     */
    public function create(
        $parentId,
        $title,
        $description
    );

    /**
     * Find by ID.
     *
     * @param $id ID of category
     *
     * @return mixed
     */
    public function find( $id );

    /**
     * Update exist category by ID.
     *
     * @param $category Updated category
     *
     * @return Category|null
     */
    public function update( $category );

    /**
     * Delete by ID.
     *
     * @param $id ID of category
     *
     * @return mixed
     */
    public function delete( $id );

    /**
     * Get categories lowest(second) level for item.
     *
     * @return mixed
     */
    public function itemCategories();

    /**
     * Get categories of higher(first) level for child categories.
     *
     * @return mixed
     */
    public function parentCategories();
}
