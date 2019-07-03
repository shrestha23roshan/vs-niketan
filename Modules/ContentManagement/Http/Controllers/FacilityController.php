<?php

namespace Modules\ContentManagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ContentManagement\Repositories\Facility\FacilityRepository;
use Modules\ContentManagement\Http\Requests\Facility\StoreRequest;
use Modules\ContentManagement\Http\Requests\Facility\UpdateRequest;

class FacilityController extends Controller
{
    private $category;

    public function __construct(FacilityRepository $facility)
    {
        $this->facility = $facility;
        $this->destinationpath = 'uploads/content-management/facilities/';
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('contentmanagement::Facility.index')
            ->withFacilities($this->facility->getLatest());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('contentmanagement::Facility.create');
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
            $new_file_name = "facility_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }

        $facility = $this->facility->create($data);
        if ($facility) {
            return redirect()->route('admin.content-management.facilities.index')
                ->withSuccessMessage('Facility is added successfully.');
        }
        return redirect()->back()
                ->withInput()
                ->withWarningMessage('Facility can not be added.');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        // return view('contentmanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        return view('contentmanagement::Facility.edit')
            ->withFacility($this->facility->find($id));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('attachment');
        $facility = $this->facility->find($id);

        $imageFile = $request->attachment;
        if ($imageFile) {
            if (file_exists($this->destinationpath . $facility->attachment) &&  $facility->attachment != '') {
                unlink($this->destinationpath . $facility->attachment);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "facility_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : null;
        }
        
        $facility = $this->facility->update($id, $data);
        if($facility){
            return redirect()->route('admin.content-management.facilities.index')
                ->withSuccessMessage('Facility is updated successfully');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Facility can not be updated.');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $facility = $this->facility->find($id);
        $previousAttachment = $facility->attachment;

        $flag = $this->facility->destroy($id);
        if ($flag) {
            if (file_exists($this->destinationpath . $previousAttachment) && $previousAttachment != '') {
                unlink($this->destinationpath . $previousAttachment);
            }

            return response()->json([
                'type' => 'success',
                'message' => 'Facility is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Facility can not be deleted.',
        ], 422);
    }
}
