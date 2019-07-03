<?php

namespace Modules\ContentManagement\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\ContentManagement\Repositories\AboutUs\AboutUsRepository;
use Modules\ContentManagement\Http\Requests\AboutUs\UpdateRequest;

class AboutUsController extends Controller
{
    private $about_us;

    public function __construct(AboutUsRepository $about_us)
    {
        $this->about_us = $about_us;
        $this->destinationpath = 'uploads/content-management/about-us/';
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('contentmanagement::AboutUs.index')
            ->withHighSchoolAboutUs($this->about_us->find(1))
            ->withPlusTwoAboutUs($this->about_us->find(2))
            ->withBachelorsAboutUs($this->about_us->find(3))
            ->withMastersAboutUs($this->about_us->find(4));
    }

    /**
     * Update the specified resource in storage.
     * @param \Modules\ContentManagement\Http\Requests\AboutUs\UpdateRequest $request
     * @param string $category
     * @param int $id
     * @return Response
     */
    public function update(UpdateRequest $request, $category, $id)
    {
        switch ($category) {
            case 'School':
                $data['description'] = $request->school_description;
                $about_us = $this->updateCategoryAboutus($id, $data, $request);
                break;

            case 'Plus Two':
                $data['description'] = $request->plus_two_description;
                $about_us = $this->updateCategoryAboutus($id, $data, $request);
                break;
            
            case 'Bachelors':
                $data['description'] = $request->bachelors_description;
                $about_us = $this->updateCategoryAboutus($id, $data, $request);
                break;

            case 'Masters':
                $data['description'] = $request->masters_description;
                $about_us = $this->updateCategoryAboutus($id, $data, $request);
                break;

            default:
                $about_us = null;
                break;
        }

        if($about_us){
            return redirect()->route('admin.content-management.about-us.index')
                ->withSuccessMessage('About us is updated successfully');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('About us can not be updated, please try again.');
    }

    /**
     * Update about us based on id
     * Created at: Tuesday, March 5, 2019
     * Updated at: Tuesday, March 5, 2019
     * @author Siddhant Thapa
     * 
     * @param int $id
     * @param array $data
     * @param \Modules\ContentManagement\Http\Requests\AboutUs\UpdateRequest $request
     * @return \Modules\ContentManagement\Entities\AboutUs
     */
    private function updateCategoryAboutus(int $id, array $data, UpdateRequest $request)
    {
        $about_us = $this->about_us->find($id);

        $imageFile = $request->attachment;
        if($imageFile) {
            if (file_exists($this->destinationpath . $about_us->attachment) &&  $about_us->attachment != '') {
                unlink($this->destinationpath . $about_us->attachment);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = 'about_us_' . str_random(8) . '_' . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }

        return $this->about_us->update($id, $data);
    }
}
