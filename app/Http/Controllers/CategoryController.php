<?php
/**
 * @copyright 2015 (c), by Vitaliy Tsutsman
 *
 * @author Vitaliy Tsutsman <vitaliyacm@gmail.com>
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\CategoryService;
use App\Services\CategoryServices;

/**
 * Class CategoryController.
 * Manage categories.
 *
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
    /// *** Properties  *** ///
    /**
     * Service for work with categories
     *
     * @var CategoryService
     */
    protected $categoryService;


    /// *** Methods     *** ///
    /**
     * Constructor
     */
    public function __construct( CategoryService $service )
    {
        //- Set access level -//
        $this -> middleware( 'auth' );

        //- Inject Dependencies -//
        $this -> categoryService = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //- Show view with list of categories -//
        return view(
            'category.list',
            [
                'categories' => $this -> categoryService -> findAll()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //- Show view for create a new Category -//
        return view(
            'category.create',
            [
                'categories' => $this -> categoryService -> parentCategories()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $request Request with valid input
     *
     * @return Response
     */
    public function store( StoreCategoryRequest $request )
    {
        try {
            //- Create a new category -//
            $category = $this -> categoryService -> create(
                $request -> get( 'parent_id' ),
                $request -> get( 'title' ),
                $request -> get( 'description' )
            );

            //- Redirect to view created category -//
            return redirect( '/categories/' . $category -> id );
        } catch ( \Exception $e ) {
            //- Failure. Show form for create a new Category again -//
            return redirect( '/categories/create' )
                -> withMessage( trans( 'messages.error.general' ) );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id ID of Category
     *
     * @return Response
     */
    public function show( $id )
    {
        //- Show view with info about Category -//
        return view(
            'category.show',
            [
                'category' => $this -> categoryService -> find( $id )
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id ID of Category
     *
     * @return Response
     */
    public function edit( $id )
    {
        //- Show view for create a new Category -//
        return view(
            'category.edit',
            [
                'categories'    => $this -> categoryService -> parentCategories(),
                'category'      => $this -> categoryService -> find( $id )
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $request
     * @param  int $id
     *
     * @return Response
     */
    public function update( UpdateCategoryRequest $request, $id )
    {
        try {
            //- Search category -//
            $category = $this -> categoryService -> find( $id );
                //- Update data -//
                $category -> id_parent_category = $request -> get( 'parent_id' );
                $category -> title = $request -> get( 'title' );
                $category -> description = $request -> get( 'description' );

            //- Update -//
            $this -> categoryService -> update( $category );

            //- Redirect to view this categories -//
            return redirect( '/categories/' . $id );
        } catch ( \Exception $e ) {
            //- Failure. Show form for edit Category again -//
            return redirect( '/categories/' . $id . '/edit' )
                -> withMessage( trans( 'messages.error.general' ) );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy( $id )
    {
        try {
            //- Try to delete category -//
            $this -> categoryService -> delete( $id );

            //- Success -//
            return redirect( '/categories' )
                -> withMessage( trans( 'messages.delete.success' ) );
        } catch ( \Exception $e ) {
            //- Failure. Unknown error -//
            return redirect( '/categories' )
                -> withMessage( trans( 'messages.error.general' ) );
        }
    }
}
