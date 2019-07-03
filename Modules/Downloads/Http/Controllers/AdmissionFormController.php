<?php

namespace Modules\Downloads\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Repositories\Category\CategoryRepository;
use Modules\Downloads\Repositories\AdmissionForm\AdmissionFormRepository;
use Modules\Downloads\Http\Requests\AdmissionForm\StoreRequest;
use Modules\Downloads\Http\Requests\AdmissionForm\UpdateRequest;

class AdmissionFormController extends Controller
{
    private $category;
    private $admission_form;

    public function __construct(CategoryRepository $category, AdmissionFormRepository $admission_form)
    {
        $this->category = $category;
        $this->admission_form = $admission_form;
        $this->destinationpath = 'uploads/downloads/admissionform/';
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('downloads::AdmissionForm.index')
            ->withHighSchoolAdmissionForm($this->admission_form->findByCategoryId(1))
            ->withPlusTwoAdmissionForm($this->admission_form->findByCategoryId(2))
            ->withBachelorsAdmissionForm($this->admission_form->findByCategoryId(3));
            // ->withMastersAdmissionForm($this->admission_form->findByCategoryId(4))
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('downloads::AdmissionForm.create')
        ->withCategories($this->category->all());
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        if($request->category_id == 4) {
            return redirect()->back()->withInput()
                ->withWarningMessage('This feature is not available in this version.');
        }
        
        $data = $request->except('download_attachment');

        $imageFile = $request->download_attachment;
        if($imageFile) {
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "admission_form_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['download_attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        $admission_form = $this->admission_form->create($data);

        if($admission_form){
            return redirect()->route('admin.download.admission-form.index')
                        ->withSuccessMessage('Admission Form is added successfully.');
        }
    
        return redirect()->back()
                ->withInput()
                ->withWarningMessage('Admission Form can not be added.');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        // return view('downloads::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        return view('downloads::AdmissionForm.edit')
        ->withAdmissionForm($this->admission_form->find($id));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('download_attachment');
        $admission_form = $this->admission_form->find($id);

        $imageFile = $request->download_attachment;
        if($imageFile) {
            if (file_exists($this->destinationpath . $admission_form->download_attachment) &&  $admission_form->download_attachment != '') {
                unlink($this->destinationpath . $admission_form->download_attachment);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "admission_form_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['download_attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        $admission_form = $this->admission_form->update($id, $data);

        if($admission_form){
            return redirect()->route('admin.download.admission-form.index')
                        ->withSuccessMessage('Admission Form is update successfully.');
        }
    
        return redirect()->back()
                ->withInput()
                ->withWarningMessage('Admission Form can not be update.');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $admission_form = $this->admission_form->find($id);
        $previousAttachment = $admission_form->download_attachment;

        $flag = $this->admission_form->destroy($id);
        if ($flag) {
            if (file_exists($this->destinationpath . $previousAttachment) && $previousAttachment != '') {
                unlink($this->destinationpath . $previousAttachment);
            }

            return response()->json([
                'type' => 'success',
                'message' => 'Admission Form is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Admission Form can not be deleted.',
        ], 422);
    }
}
