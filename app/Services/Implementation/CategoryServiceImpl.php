<?php
/**
 * @copyright 2015 (c), by Vitaliy Tsutsman
 *
 * @author Vitaliy Tsutsman <vitaliyacm@gmail.com>
 */

namespace App\Services\Implementation;

use App\Category;
use App\Services\CategoryService;
use Illuminate\Support\Facades\DB;

/**
 * Class CategoryServiceImpl
 * Service for work with categories.
 * @see App\Services\CategoryService
 *
 * @package App\Services\Implementation
 */
class CategoryServiceImpl implements CategoryService {

    /**
     * Find all categories.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findAll() {
        return Category :: all();
    }

    /**
     * Create a new Category.
     *
     * @param $parentId     ID of parent category or null
     * @param $title        Title of category
     * @param $description  Description of category
     *
     * @return Category|null
     */
    public function create(
        $parentId,
        $title,
        $description
    )
    {
        //- Create a new Category -//
        $category = new Category();
            //- Fill data -//
            $category -> title = $title;
            $category -> description = $description;

        //- Check parent category -//
        if (!empty($parentId))
            $category -> id_parent_category = $parentId;

        //- Persist -//
        return ( $category -> save() ) ? $category : null;
    }

    /**
     * Find category by ID.
     *
     * @param $id ID of category
     *
     * @return \Illuminate\Support\Collection|null|static
     */
    public function find( $id )
    {
        return Category :: find( $id );
    }

    /**
     * Update exist category by ID.
     *
     * @param $category Updated category
     *
     * @return Category|null
     */
    public function update( $category )
    {
        return ( $category -> save() ) ? $category : null;
    }

    /**
     * Delete category by ID.
     *
     * @param $id ID of category
     */
    public function delete( $id )
    {
        Category :: destroy( $id );
    }

    /**
     * Get categories lowest(second) level for item
     *
     * @return mixed
     */
    public function itemCategories()
    {
        return DB :: table( 'categories' )
            -> whereNotNull( 'id_parent_category' )
            -> get();
    }

    /**
     * Get categories of higher(first) level for child categories.
     *
     * @return mixed
     */
    public function parentCategories()
    {
        return DB :: table( 'categories' )
            -> whereNull( 'id_parent_category' )
            -> get();
    }

    /**
     * Get categories for display in menu.
     *
     * @return Categories of first level with relations
     */
    public function menu()
    {
        $menuCategory = Category :: all()
            -> where( 'id_parent_category', null );

        return $menuCategory;
    }
}
