<?php

namespace Modules\Downloads\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Repositories\Category\CategoryRepository;
use Modules\Downloads\Repositories\Result\ResultRepository;
use Modules\Downloads\Http\Requests\Result\StoreRequest;
use Modules\Downloads\Http\Requests\Result\UpdateRequest;

class ResultController extends Controller
{
    private $category;
    private $result;

    public function __construct(CategoryRepository $category, ResultRepository $result)
    {
        $this->category = $category;
        $this->result = $result;
        $this->destinationpath = 'uploads/downloads/results/';
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('downloads::Result.index')
            ->withHighSchoolResult($this->result->findByCategoryId(1))
            ->withPlusTwoResult($this->result->findByCategoryId(2))
            ->withBachelorsResult($this->result->findByCategoryId(3));
            // ->withMastersResult($this->result->findByCategoryId(3))
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('downloads::Result.create')
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
            $new_file_name = "result_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['download_attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        $result = $this->result->create($data);

        if($result){
            return redirect()->route('admin.download.result.index')
                        ->withSuccessMessage('Result is added successfully.');
        }
    
        return redirect()->back()
                ->withInput()
                ->withWarningMessage('Result can not be added.');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('downloads::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        return view('downloads::Result.edit')
        ->withResult($this->result->find($id));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('download_attachment');
        $result = $this->result->find($id);

        $imageFile = $request->download_attachment;
        if($imageFile) {
            if (file_exists($this->destinationpath . $result->download_attachment) &&  $result->download_attachment != '') {
                unlink($this->destinationpath . $result->download_attachment);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "result_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['download_attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        $result = $this->result->update($id, $data);

        if($result){
            return redirect()->route('admin.download.result.index')
                        ->withSuccessMessage('Result is update successfully.');
        }
    
        return redirect()->back()
                ->withInput()
                ->withWarningMessage('Result can not be update.');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $result = $this->result->find($id);
        $previousAttachment = $result->download_attachment;

        $flag = $this->result->destroy($id);
        if ($flag) {
            if (file_exists($this->destinationpath . $previousAttachment) && $previousAttachment != '') {
                unlink($this->destinationpath . $previousAttachment);
            }

            return response()->json([
                'type' => 'success',
                'message' => 'Result is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Result can not be deleted.',
        ], 422);
    }
}
