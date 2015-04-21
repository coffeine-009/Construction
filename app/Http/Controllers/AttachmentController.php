<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Services\AttachmentService;
use Illuminate\Http\Response;

/**
 * Class AttachmentController.
 * Manage attachments.
 *
 * @package App\Http\Controllers
 */
class AttachmentController extends Controller
{
    /// *** Properties  *** ///
    /**
     * Service for work with attachments.
     *
     * @var AttachmentService
     */
    private $attachmentService;


    /**
     * Constructor
     *
     * @param AttachmentService $attachmentService
     */
    public function __construct( AttachmentService $attachmentService )
    {
        //- Inject dependencies -//
        $this -> attachmentService = $attachmentService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show( $id )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit( $id )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update( $id )
    {
        //
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
            //- Remove attachment -//
            $this -> attachmentService -> delete( $id );
        } catch ( \Exception $e ) {
            return Response :: setStatusCode( 400 );
        }
    }

}
