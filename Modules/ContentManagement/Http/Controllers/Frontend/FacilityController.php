<?php

namespace Modules\ContentManagement\Http\Controllers\Frontend;

use Illuminate\Routing\Controller;

use Modules\ContentManagement\Repositories\Facility\FacilityRepository;
use Modules\Testimonial\Repositories\Testimonial\TestimonialRepository;
use Modules\Seo\Repositories\Seo\SeoRepository;

class FacilityController extends Controller
{
    private $facilities;

    private $testimonial;

    private $seo;

    public function __construct(
        FacilityRepository $facilities,
        TestimonialRepository $testimonial,
        SeoRepository $seo
    )
    {
        $this->facilities = $facilities;
        $this->testimonial = $testimonial;
        $this->seo = $seo;
    }

    public function index(string $category)
    {
        switch ($category) {
            case 'school':
                $testimonial = $this->testimonial->findByCategoryId(1);
                break;

            case 'plus-two':
                $testimonial = $this->testimonial->findByCategoryId(2);
                break;

            case 'bachelors':
                $testimonial = $this->testimonial->findByCategoryId(3);
                break;

            case 'masters':
                $testimonial = $this->testimonial->findByCategoryId(4);
                break;
            
            default:
                $testimonial = 'Default';
                break;
        }

        return view('contentmanagement::Frontend.Facility.index')
            ->withFacilities($this->facilities->getLatest())
            ->withTestimonials($testimonial)
            ->withSeo($this->seo->findByField('page', 'facilities'));
    }

}
