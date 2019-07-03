<?php

namespace Modules\BulletinBoardManagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Repositories\Category\CategoryRepository;
use Modules\BulletinBoardManagement\Repositories\News\NewsRepository;
use Modules\BulletinBoardManagement\Http\Requests\News\StoreRequest;
use Modules\BulletinBoardManagement\Http\Requests\News\UpdateRequest;

class NewsController extends Controller
{
    private $category;

    private $news;

    public function __construct(
        CategoryRepository $category, 
        NewsRepository $news
    )
    {
        $this->category = $category;
        $this->news = $news;
        $this->destinationpath = 'uploads/bulletin-board-management/news/';
    }
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('bulletinboardmanagement::News.index')
            ->withHighSchoolNews($this->news->getAllByCategoryId(1))
            ->withPlusTwoNews($this->news->getAllByCategoryId(2))
            ->withBachelorsNews($this->news->getAllByCategoryId(3))
            ->withMastersNews($this->news->getAllByCategoryId(4));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('bulletinboardmanagement::News.create')
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
            $new_file_name = "news_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }

        $news = $this->news->create($data);
        if($news){
            return redirect()->route('admin.bulletin-board-management.news.index')
                        ->withSuccessMessage('News is added successfully.');
        }

        return redirect()->back()
                ->withInput()
                ->withWarningMessage('News can not be added.');
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
        return view('bulletinboardmanagement::News.edit')
        ->withNews($this->news->find($id));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('attachment');
        $news = $this->news->find($id);

        $imageFile = $request->attachment;
        if($imageFile) {
            if (file_exists($this->destinationpath . $news->attachment) &&  $news->attachment != '') {
                unlink($this->destinationpath . $news->attachment);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "news_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : null;
        }

        $news = $this->news->update($id, $data);
        if($news){
            return redirect()->route('admin.bulletin-board-management.news.index')
                ->withSuccessMessage('News is updated successfully');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('News can not be updated.');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $news = $this->news->find($id);
        $previousAttachment = $news->attachment;

        $flag = $this->news->destroy($id);
        if ($flag) {
            if (file_exists($this->destinationpath . $previousAttachment) && $previousAttachment != '') {
                unlink($this->destinationpath . $previousAttachment);
            }

            return response()->json([
                'type' => 'success',
                'message' => 'News is deleted successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'News can not be deleted.',
        ], 422);
    }
}
