<?php

namespace Modules\Alumni\Http\Controllers\Frontend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Alumni\Repositories\Alumni\AlumniRepository;
use Modules\Testimonial\Repositories\Testimonial\TestimonialRepository;
use Modules\Alumni\Http\Requests\Alumni\StoreRequest;
use Modules\Seo\Repositories\Seo\SeoRepository;

class AlumniController extends Controller
{
    private $alumni;

    private $testimonial;

    private $seo;

    public function __construct(
        AlumniRepository $alumni,
        TestimonialRepository $testimonial,
        SeoRepository $seo
    )
    {
        $this->alumni = $alumni;
        $this->destinationpath = 'uploads/alumni/';
        $this->testimonial = $testimonial;
        $this->seo = $seo;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(string $category)
    {
        switch ($category) {
            case 'school':
                $alumni = $this->alumni->getActiveAndPaginate(1);
                $testimonial = $this->testimonial->findByCategoryId(1);
                break;

            case 'plus-two':
                $alumni = $this->alumni->getActiveAndPaginate(12);
                $testimonial = $this->testimonial->findByCategoryId(2);
                break;

            case 'bachelors':
                $alumni = $this->alumni->getActiveAndPaginate(12);
                $testimonial = $this->testimonial->findByCategoryId(3);
                break;

            case 'masters':
                $alumni = $this->alumni->getActiveAndPaginate(12);
                $testimonial = $this->testimonial->findByCategoryId(4);
                break;
            
            default:
                $alumni = 'Default';
                break;
        }

        return view('alumni::Frontend.Alumni.index')
            ->withAlumni($alumni)
            ->withTestimonials($testimonial)
            ->withSeo($this->seo->findByField('page', 'alumni'));
    }


    /**
     * Store a newly created alumni in storage.
     *
     * @param  App\Modules\Alumni\Requests\Alumni\StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->except('attachment');

        $imageFile = $request->attachment;
        if($imageFile) {
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = 'alumni_' . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
            $data['is_active'] = 0;
        }

        $alumni = $this->alumni->create($data);
        if($alumni){
            return redirect()->route('alumni')
                ->withSuccessMessage('Submitted successfully.');
        }
        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Failed to submit, Please try again.');
    }

}
