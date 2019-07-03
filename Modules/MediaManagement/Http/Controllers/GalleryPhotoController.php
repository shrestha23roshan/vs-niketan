<?php

namespace Modules\MediaManagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\MedaiManagement\Repositories\GalleryPhoto\GalleryPhotoRepository;
use Modules\MediaManagement\Repositories\Gallery\GalleryRepository;
use Illuminate\Support\Facades\Session;

class GalleryPhotoController extends Controller
{
    private $photo;

    private $gallery;

    public function __construct(GalleryPhotoRepository $photo, GalleryRepository $gallery)
    {
        $this->photo = $photo;
        $this->gallery = $gallery;
        $this->destinationpath = 'uploads/media-management/gallery/photos/';
    }
   
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create($id)
    {
        return view('mediamanagement::GalleryPhoto.create')
        ->withGallery($this->gallery->find($id));

    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request, $id)
    {
        $photos = $request->file('file');
        if($photos) {
            $galleryPhoto = null;
            foreach($photos as $photo){
                /** separate extension, move to directory and store name in database  */
                $extension = strrchr($photo->getClientOriginalName(), '.');
                $new_file_name = "gallery-photo_" . sha1(date('YmdHis') . str_random(30));;
                $attachment = $photo->move($this->destinationpath, $new_file_name.$extension);
                $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;

                /** work id */
                $data['gallery_id'] = $id;

                /** New work photo is created here */
                $galleryPhoto = $this->photo->create($data);
            }

            if($galleryPhoto){
                Session::flash('success_message', 'Photo is added successfully.');
                return response()->json([
                    'type' => 'success',
                    'message' => 'Photo is added successfully.',
                ], 200);
            }

            Session::flash('error_message', 'Photo can not added, please try again later.');
            return response()->json([
                'type' => 'error',
                'message' => 'Photo can not added, please try again later.'
            ], 200);
        }

        Session::flash('error_message', 'Photo can not added, please try again later.');
        return response()->json([
            'type' => 'error',
            'message' => 'Photo can not added, please try again later.'
        ], 200);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        return view('mediamanagement::GalleryPhoto.show')
        ->withPhotos($this->photo->findByGalleryId($id))
        ->withGallery($this->gallery->find($id));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $photo = $this->photo->find($id);
        $previousAttachment = $photo->attachment;

        $flag = $this->photo->destroy($id);
        if ($flag) {
            if (file_exists($this->destinationpath . $previousAttachment) && $previousAttachment != '') {
                unlink($this->destinationpath . $previousAttachment);
            }

            return response()->json([
                'type' => 'success',
                'message' => 'Photo is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Photo can not be deleted.',
        ], 422);
    }
}
