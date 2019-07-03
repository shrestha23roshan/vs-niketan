<?php

namespace Modules\MediaManagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\MediaManagement\Repositories\Banner\BannerRepository;
use App\Repositories\Category\CategoryRepository;
use Modules\MediaManagement\Http\Requests\Banner\StoreRequest;
use Modules\MediaManagement\Http\Requests\Banner\UpdateRequest;

class BannerController extends Controller
{
    private $banner;
    protected $category;

    public function __construct(BannerRepository $banner, CategoryRepository $category)
    {
        $this->banner = $banner;
        $this->category = $category;
        $this->destinationpath = 'uploads/media-management/banners/';
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('mediamanagement::Banner.index')
            ->withHighSchoolBanners($this->banner->findByCategoryId(1))
            ->withPlusTwoBanners($this->banner->findByCategoryId(2))
            ->withBachelorsBanners($this->banner->findByCategoryId(3))
            ->withMastersBanners($this->banner->findByCategoryId(4));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('mediamanagement::Banner.create')
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
            $new_file_name = "banner_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }

        $banner = $this->banner->create($data);
        if($banner){
            return redirect()->route('admin.media-management.banner.index')
                        ->withSuccessMessage('Banner is added successfully.');
        }

        return redirect()->back()
                ->withInput()
                ->withWarningMessage('banner can not be added.');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        return view('mediamanagement::Banner.edit')
        ->withBanner($this->banner->find($id));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('attachment');
        $banner = $this->banner->find($id);

        $imageFile = $request->attachment;
        if($imageFile) {
            if (file_exists($this->destinationpath . $banner->attachment) &&  $banner->attachment != '') {
                unlink($this->destinationpath . $banner->attachment);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "banner_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : null;
        }

        $banner = $this->banner->update($id, $data);
        if($banner){
            return redirect()->route('admin.media-management.banner.index')
                ->withSuccessMessage('banner is updated successfully');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('banner can not be updated.');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $banner = $this->banner->find($id);
        $previousAttachment = $banner->attachment;

        $flag = $this->banner->destroy($id);
        if ($flag) {
            if (file_exists($this->destinationpath . $previousAttachment) && $previousAttachment != '') {
                unlink($this->destinationpath . $previousAttachment);
            }

            return response()->json([
                'type' => 'success',
                'message' => 'banner is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'banner can not be deleted.',
        ], 422);
    }
}
