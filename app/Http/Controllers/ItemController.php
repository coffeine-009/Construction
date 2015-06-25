<?php
/**
 * @copyright 2015 (c), by Vitaliy Tsutsman
 *
 * @author Vitaliy Tsutsman <vitaliyacm@gmail.com>
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Services\CategoryService;
use App\Services\ItemService;
use App\Http\Requests\UpdateItemRequest;

/**
 * Class ItemController.
 * Manage items.
 *
 * @package App\Http\Controllers
 */
class ItemController extends Controller
{
    /// *** Properties  *** ///
    /**
     * Service for work with categories.
     *
     * @var CategoryService
     */
    protected $categoryService;

    /**
     * Service for work with items.
     *
     * @var ItemService
     */
    protected $itemService;


    /// *** Methods     *** ///
    /**
     * Constructor.
     *
     * @param CategoryService $categoryService
     * @param ItemService $itemService
     */
    function __construct(
        CategoryService $categoryService,
        ItemService $itemService
    ) {
        $this -> middleware( 'auth', [ 'except' => [ 'index', 'listAction', 'show' ] ] );

        //- Inject dependencies -//
        $this -> categoryService = $categoryService;
        $this -> itemService = $itemService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index( $id )
    {
        return view(
            'item.index',
            [
                'items' => $this -> itemService -> findByCategory( $id )
            ]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function listAction()
    {
        return view(
            'item.list',
            [
                'items' => $this -> itemService -> findAll()
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
        return view(
            'item.create',
            [
                'categories' => $this -> categoryService -> itemCategories()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store( Requests\StoreItemRequest $request )
    {
        try {
            //- Create item -//
            $item = $this -> itemService -> create(
                $request -> file( 'attachments' ),
                $request -> get( 'category' ),
                $request -> get( 'title' ),
                $request -> get( 'description' )
            );

            //- Success -//
            return redirect( '/items/' . $item -> id )
                -> withMessage( trans( 'messages.create.success' ) );
        } catch ( \Exception $e ) {
            //- Failure. Show form for create a new Item again -//
            return redirect( '/items/create' )
                -> withMessage( trans( 'messages.error.general' ) );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show( $id )
    {
        return view(
            'item.show',
            [
                'item' => $this -> itemService -> find( $id )
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit( $id )
    {
        //- Search -//
        return view(
            'item.edit',
            [
                'categories' => $this -> categoryService -> itemCategories(),
                'item' => $this -> itemService -> find( $id )
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update( UpdateItemRequest $request, $id )
    {
        try {
            //- Create item -//
            $item = $this -> itemService -> update(
                $id,
                $request -> file( 'attachments' ),
                $request -> get( 'category' ),
                $request -> get( 'title' ),
                $request -> get( 'description' )
            );

            //- Success -//
            return redirect( '/items/' . $item -> id )
                -> withMessage( trans( 'messages.update.success' ) );
        } catch ( \Exception $e ) {
            //- Failure. Show form for create a new Item again -//
            return redirect( '/items/create' )
                -> withMessage( trans( 'messages.error.general' ) );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy( $id )
    {
        try {
            $this -> itemService -> delete( $id );

            //- Success -//
            return redirect( '/items' )
                -> withMessage( trans( 'messages.delete.success' ) );
        } catch ( \Exception $e ) {
            //- Failure. Unknown error -//
            return redirect( '/categories' )
                -> withMessage( trans( 'messages.error.general' ) );
        }
    }
}
