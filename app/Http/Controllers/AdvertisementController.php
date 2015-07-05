<?php
/**
 * @copyright 2015 (c), by Vitaliy Tsutsman
 *
 * @author Vitaliy Tsutsman <vitaliyacm@gmail.com>
 */

namespace App\Http\Controllers;

use App\Advertisement;
use App\Attachment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\AdvertisementService;
use App\Services\AttachmentService;
use Illuminate\Http\Request;

/**
 * Class AdvertisementsController
 * @package App\Http\Controllers
 */
class AdvertisementController extends Controller
{

    /// *** Properties  *** ///
    private $advertisementService;
    private $attachmentService;


    /// *** Methods *** ///
    public function __construct(
        AdvertisementService $advertisementService,
        AttachmentService $attachmentService
    ) {
        $this -> middleware( 'auth', [ 'except' => [ 'index', 'show' ] ] );

        //- Init -//
        $this -> advertisementService = $advertisementService;
        $this -> attachmentService = $attachmentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view(
            'advertisement.index',
            [
                'advertisements' => $this -> advertisementService -> findAll()
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
            'advertisement.create',
            []
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store( Requests\AdvertisementStoreRequest $request )
    {
        try {
            $attachment = new Attachment();
                $attachment -> setFile( $request -> file( 'attachment' ) );

            $advertisement = new Advertisement();
                $advertisement -> message = $request -> get( 'message' );
                $advertisement -> setAttachment( $attachment );

            $this -> advertisementService -> create( $advertisement );

            //- Success -//
            return redirect( '/advertisements/' )
                -> withMessage( trans( 'messages.create.success' ) );
        } catch ( \Exception $e ) {
            //- Failure. Show form for create a new Item again -//
            return redirect( '/advertisements/create' )
                -> withMessage( trans( 'messages.error.general' ) );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
