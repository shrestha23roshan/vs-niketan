<?php

namespace Modules\ContentManagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ContentManagement\Repositories\Achievement\AchievementRepository;
use Modules\ContentManagement\Http\Requests\Achievement\UpdateRequest;

class AchievementController extends Controller
{
    private $achievements;

    public function __construct(AchievementRepository $achievements)
    {
        $this->achievements = $achievements;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('contentmanagement::Achievement.index')
            ->withAchievements($this->achievements->all());
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        return view('contentmanagement::Achievement.edit')
            ->withAchievement($this->achievements->find($id));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->all();
        $achievements = $this->achievements->find($id);

        $achievements = $this->achievements->update($id, $data);
        
        if($achievements){
            return redirect()->route('admin.content-management.achievements.index')
                ->withSuccessMessage('Achievement is updated successfully');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Achievement can not be updated.');
    }

}
