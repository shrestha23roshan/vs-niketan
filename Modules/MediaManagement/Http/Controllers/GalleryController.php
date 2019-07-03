<?php

namespace Modules\MediaManagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\MediaManagement\Repositories\Gallery\GalleryRepository;
use App\Repositories\Category\CategoryRepository;
use Modules\MediaManagement\Http\Requests\Gallery\StoreRequest;
use Modules\MediaManagement\Http\Requests\Gallery\UpdateRequest;
use Modules\MedaiManagement\Repositories\GalleryPhoto\GalleryPhotoRepository;

class GalleryController extends Controller
{
    private $gallery;
    private $category;
    private $photo;

    public function __construct(GalleryRepository $gallery,CategoryRepository $category, GalleryPhotoRepository $photo)
    {
        $this->gallery = $gallery;
        $this->category = $category;
        $this->photo = $photo;
        $this->destinationpath = 'uploads/media-management/gallery/';
        $this->photodestinationpath = 'uploads/media-management/gallery/photos/';
    }
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('mediamanagement::Gallery.index')
            ->withHighSchoolGallery($this->gallery->findByCategoryId(1))
            ->withPlusTwoGallery($this->gallery->findByCategoryId(2))
            ->withBachelorsGallery($this->gallery->findByCategoryId(3))
            ->withMastersGallery($this->gallery->findByCategoryId(4));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('mediamanagement::Gallery.create')
        ->withCategories($this->category->all());
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->except('attachment');

        $imageFile = $request->attachment;
        if ($imageFile) {
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "gallery_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        $gallery = $this->gallery->create($data);

        if($gallery){
            return redirect()->route('admin.media-management.gallery.index')
                    ->withSuccessMessage('Gallery is added successfully.');
        }

        return redirect()->back()
                ->withInput()
                ->withWarningMessage('Gallery can not be added.');
    }


    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        return view('mediamanagement::Gallery.edit')
        ->withGallery($this->gallery->find($id));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('attachment');
        $gallery = $this->gallery->find($id);

        $imageFile = $request->attachment;
        if($imageFile) {
            if (file_exists($this->destinationpath . $gallery->attachment) &&  $gallery->attachment != '') {
                unlink($this->destinationpath . $gallery->attachment);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "gallery_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : null;
        }
        $gallery = $this->gallery->update($id, $data);
        
        if($gallery){
            return redirect()->route('admin.media-management.gallery.index')
                ->withSuccessMessage('Gallery is updated successfully');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Gallery can not be updated.');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $gallery = $this->gallery->find($id);
        $previousAttachment = $gallery->attachment;

        $galleryPhotos = $this->photo->findByGalleryId($id); // album photos retrieved to delete

        $flag = $this->gallery->destroy($id);
        if ($flag) {
            if (file_exists($this->destinationpath . $previousAttachment) && $previousAttachment != '') {
                unlink($this->destinationpath . $previousAttachment);
            }

            foreach ($galleryPhotos as $photo) {
                if (file_exists($this->photodestinationpath . $photo->attachment) && $photo->attachment != '') {
                    unlink($this->photodestinationpath . $photo->attachment);
                }
            }

            return response()->json([
                'type' => 'success',
                'message' => 'Gallery is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Gallery can not be deleted.',
        ], 422);
    }
}
