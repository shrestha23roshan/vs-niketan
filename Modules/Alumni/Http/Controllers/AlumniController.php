<?php

namespace Modules\Alumni\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Alumni\Repositories\Alumni\AlumniRepository;
use Modules\Alumni\Http\Requests\Alumni\StoreRequest;

class AlumniController extends Controller
{
    private $alumni;

    public function __construct(AlumniRepository $alumni)
    {
        $this->alumni = $alumni;
        $this->destinationpath = 'uploads/alumni/';
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('alumni::Alumni.index')
        ->withAlumni($this->alumni->all());
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        return view('alumni::Alumni.show')
        ->withAlumni($this->alumni->find($id));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $alumni = $this->alumni->find($id);
        $previousAttachment = $alumni->attachment;

        $flag = $this->alumni->destroy($id);
        if ($flag) {
            if (file_exists($this->destinationpath . $previousAttachment) && $previousAttachment != '') {
                unlink($this->destinationpath . $previousAttachment);
            }

            return response()->json([
                'type' => 'success',
                'message' => 'Alumni is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Alumni can not be deleted.',
        ], 422);
    }

     /**
     * Change status of the specified downloads from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $alumni = $this->alumni->changeStatus($request->id);
        if($alumni){
            return response()->json([
                'type'=>'success',
                'alumni'=>$alumni,
                'message'=>'Status of selected alumni is changed successfully.'
            ], 200);
        }
        return response()->json([
            'type'=>'error',
            'message'=>'Status of selected alumni can not changed.',
        ], 422);
    }
}
