<?php

namespace Modules\MediaManagement\Http\Controllers\Frontend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\MediaManagement\Repositories\Video\VideoRepository;
use Modules\Testimonial\Repositories\Testimonial\TestimonialRepository;
use Modules\Seo\Repositories\Seo\SeoRepository;

class VideoController extends Controller
{
    private $video;

    private $testimonial;

    private $seo;

    public function __construct(
        VideoRepository $video,
        TestimonialRepository $testimonial,
        SeoRepository $seo
    )
    {
        $this->video = $video;
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
                $video = $this->video->findByCategoryIdAndPaginate(1, 12);
                $testimonial = $this->testimonial->findByCategoryId(1);
                break;

            case 'plus-two':
                $video = $this->video->findByCategoryIdAndPaginate(2, 12);
                $testimonial = $this->testimonial->findByCategoryId(2);
                break;

            case 'bachelors':
                $video = $this->video->findByCategoryIdAndPaginate(3, 12);
                $testimonial = $this->testimonial->findByCategoryId(3);
                break;

            case 'masters':
                $video = $this->video->findByCategoryIdAndPaginate(4, 12);
                $testimonial = $this->testimonial->findByCategoryId(4);
                break;
            
            default:
                $video = 'Default';
                break;
        }
        return view('mediamanagement::Frontend.Video.index')
            ->withVideos($video)
            ->withTestimonials($testimonial)
            ->withSeo($this->seo->findByField('page', 'videos'));
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function show(string $category, string $slug)
    {
        switch ($category) {
            case 'school':
                $video = $this->video->findBySlug($slug);
                $videos = $this->video->findByCategoryId(1);
                $testimonial = $this->testimonial->findByCategoryId(1);
                break;

            case 'plus-two':
                $video = $this->video->findBySlug($slug);
                $videos = $this->video->findByCategoryId(2);
                $testimonial = $this->testimonial->findByCategoryId(2);
                break;

            case 'bachelors':
                $video = $this->video->findBySlug($slug);
                $videos = $this->video->findByCategoryId(3);
                $testimonial = $this->testimonial->findByCategoryId(3);
                break;

            case 'masters':
                $video = $this->video->findBySlug($slug);
                $videos = $this->video->findByCategoryId(4);
                $testimonial = $this->testimonial->findByCategoryId(4);
                break;
            
            default:
                $videos = 'Default';
                break;
        }
        return view('mediamanagement::Frontend.Video.show')
            ->withVideo($video)
            ->withVideos($videos)
            ->withTestimonials($testimonial);
    }

}
