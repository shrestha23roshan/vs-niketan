<?php

namespace Modules\BulletinBoardManagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Repositories\Category\CategoryRepository;
use Modules\BulletinBoardManagement\Repositories\Notice\NoticeRepository;
use Modules\BulletinBoardManagement\Http\Requests\Notice\StoreRequest;
use Modules\BulletinBoardManagement\Http\Requests\Notice\UpdateRequest;

class NoticeController extends Controller
{
    private $category;
    private $notice;

    public function __construct(
        CategoryRepository $category, 
        NoticeRepository $notice
    )
    {
        $this->category = $category;
        $this->notice = $notice;
    }
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('bulletinboardmanagement::Notice.index')
            ->withHighSchoolNotice($this->notice->getAllByCategoryId(1))
            ->withPlusTwoNotice($this->notice->getAllByCategoryId(2))
            ->withBachelorsNotice($this->notice->getAllByCategoryId(3))
            ->withMastersNotice($this->notice->getAllByCategoryId(4));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('bulletinboardmanagement::Notice.create')
            ->withCategories($this->category->all());
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->all();

        $notice = $this->notice->create($data);
        if($notice){
            return redirect()->route('admin.bulletin-board-management.notice.index')
                ->withSuccessMessage('Notice is added successfully.');
        }
            return redirect()->back()->withInput()
                ->withWarningMessage('Notice can not be added.');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        // return view('bulletinboardmanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        return view('bulletinboardmanagement::Notice.edit')
        ->withNotice($this->notice->find($id));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();

        $notice = $this->notice->update($id, $data);
        if($notice){
            return redirect()->route('admin.bulletin-board-management.notice.index')
                ->withSuccessMessage('Notice is updated successfully.');
        }
            return redirect()->back()->withInput()
                ->withWarningMessage('Notice can not be updated.');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $flag = $this->notice->destroy($id);
        if($flag){
            return response()->json([
                'type' => 'success',
                'message' => 'Notice is successfully deleted.',
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Notice can not deleted.',
        ], 422);
    }
}
