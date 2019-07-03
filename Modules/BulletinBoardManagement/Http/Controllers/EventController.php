<?php

namespace Modules\BulletinBoardManagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Repositories\Category\CategoryRepository;
use Modules\BulletinBoardManagement\Repositories\Event\EventRepository;
use Modules\BulletinBoardManagement\Http\Requests\Event\StoreRequest;
use Modules\BulletinBoardManagement\Http\Requests\Event\UpdateRequest;

class EventController extends Controller
{
    private $category;
    private $event;

    public function __construct(CategoryRepository $category, EventRepository $event)
    {
        $this->category = $category;
        $this->event = $event;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('bulletinboardmanagement::Event.index')
            ->withHighSchoolEvent($this->event->getAllByCategoryId(1))
            ->withPlusTwoEvent($this->event->getAllByCategoryId(2))
            ->withBachelorsEvent($this->event->getAllByCategoryId(3))
            ->withMastersEvent($this->event->getAllByCategoryId(4));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('bulletinboardmanagement::Event.create')
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

        $event = $this->event->create($data);
        if($event){
            return redirect()->route('admin.bulletin-board-management.event.index')
                ->withSuccessMessage('Event is added successfully.');
        }
            return redirect()->back()->withInput()
                ->withWarningMessage('Event can not be added.');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('bulletinboardmanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        return view('bulletinboardmanagement::Event.edit')
        ->withEvent($this->event->find($id));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();

        $event = $this->event->update($id, $data);
        if($event){
            return redirect()->route('admin.bulletin-board-management.event.index')
                ->withSuccessMessage('Event is updated successfully.');
        }
            return redirect()->back()->withInput()
                ->withWarningMessage('Event can not be updated.');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $flag = $this->event->destroy($id);
        if($flag){
            return response()->json([
                'type' => 'success',
                'message' => 'Event is successfully deleted.',
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Event can not deleted.',
        ], 422);
    }
}
