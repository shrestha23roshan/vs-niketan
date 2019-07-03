<?php

namespace Modules\BulletinBoardManagement\Http\Controllers\Frontend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\BulletinBoardManagement\Repositories\Event\EventRepository;
use Modules\Testimonial\Repositories\Testimonial\TestimonialRepository;
use Modules\Seo\Repositories\Seo\SeoRepository;

class EventController extends Controller
{
    private $event;

    private $testimonial;

    private $seo;

    public function __construct(
        EventRepository $event,
        TestimonialRepository $testimonial,
        SeoRepository $seo
    )
    {
        $this->event = $event;
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
                $event = $this->event->findByCategoryIdAndPaginate(1, 16);
                $testimonial = $this->testimonial->findByCategoryId(1);
                break;

            case 'plus-two':
                $event = $this->event->findByCategoryIdAndPaginate(2, 16);
                $testimonial = $this->testimonial->findByCategoryId(4);
                break;

            case 'bachelors':
                $event = $this->event->findByCategoryIdAndPaginate(3, 16);
                $testimonial = $this->testimonial->findByCategoryId(2);
                break;

            case 'masters':
                $event = $this->event->findByCategoryIdAndPaginate(4, 16);
                $testimonial = $this->testimonial->findByCategoryId(3);
                break;
            
            default:
                $event = 'Default';
                break;
        }

        return view('bulletinboardmanagement::Frontend.Event.index')
            ->withEvents($event)
            ->withTestimonials($testimonial)
            ->withSeo($this->seo->findByField('page', 'events'));
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function show(string $category, string $slug)
    {
        switch ($category) {
            case 'school':
                $event = $this->event->findBySlug($slug);
                $events = $this->event->findByCategoryId(1);
                $testimonial = $this->testimonial->findByCategoryId(1);
                break;

            case 'plus-two':
                $event = $this->event->findBySlug($slug);
                $events = $this->event->findByCategoryId(2);
                $testimonial = $this->testimonial->findByCategoryId(2);
                break;

            case 'bachelors':
                $event = $this->event->findBySlug($slug);
                $events = $this->event->findByCategoryId(3);
                $testimonial = $this->testimonial->findByCategoryId(3);
                break;

            case 'masters':
                $event = $this->event->findBySlug($slug);
                $events = $this->event->findByCategoryId(4);
                $testimonial = $this->testimonial->findByCategoryId(4);
                break;
            
            default:
                $events = 'Default';
                break;
        }
        return view('bulletinboardmanagement::Frontend.Event.show')
            ->withEvent($event)
            ->withEvents($events->take(4))
            ->withTestimonials($testimonial);
    }

}
