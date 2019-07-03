<?php

namespace Modules\ContentManagement\Http\Controllers\Frontend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\ContentManagement\Repositories\AboutUs\AboutUsRepository;
use Modules\ContentManagement\Repositories\Achievement\AchievementRepository;
use Modules\Testimonial\Repositories\Testimonial\TestimonialRepository;
use Modules\Seo\Repositories\Seo\SeoRepository;

class AboutUsController extends Controller
{
    private $aboutUs;

    private $achievement;

    private $testimonial;

    private $seo;

    public function __construct(
        AboutUsRepository $aboutUs,
        AchievementRepository $achievement,
        TestimonialRepository $testimonial,
        SeoRepository $seo
    )
    {
        $this->aboutUs = $aboutUs;
        $this->achievement = $achievement;
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
                $aboutUs = $this->aboutUs->find(1);
                $testimonial = $this->testimonial->findByCategoryId(1);
                break;

            case 'plus-two':
                $aboutUs = $this->aboutUs->find(2);
                $testimonial = $this->testimonial->findByCategoryId(2);
                break;

            case 'bachelors':
                $aboutUs = $this->aboutUs->find(3);
                $testimonial = $this->testimonial->findByCategoryId(3);
                break;

            case 'masters':
                $aboutUs = $this->aboutUs->find(4);
                $testimonial = $this->testimonial->findByCategoryId(4);
                break;

            default:
                $aboutUs = 'Default';
                break;
        }

        return view('contentmanagement::Frontend.AboutUs.index')
            ->withAboutUs($aboutUs)
            ->withTestimonials($testimonial)
            ->withAchievements($this->achievement->find(1))
            ->withSeo($this->seo->findByField('page', 'about-us'));
    }
}
