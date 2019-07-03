<?php

namespace Modules\BulletinBoardManagement\Http\Controllers\Frontend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\BulletinBoardManagement\Repositories\News\NewsRepository;
use Modules\Testimonial\Repositories\Testimonial\TestimonialRepository;
use Modules\Seo\Repositories\Seo\SeoRepository;

class NewsController extends Controller
{
    private $news;

    private $testimonial;

    private $seo;

    public function __construct(
        NewsRepository $news,
        TestimonialRepository $testimonial,
        SeoRepository $seo
    )
    {
        $this->news = $news;
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
                $news = $this->news->findByCategoryIdAndPaginate(1, 12);
                $testimonial = $this->testimonial->findByCategoryId(1);
                break;

            case 'plus-two':
                $news = $this->news->findByCategoryIdAndPaginate(2, 12);
                $testimonial = $this->testimonial->findByCategoryId(2);
                break;

            case 'bachelors':
                $news = $this->news->findByCategoryIdAndPaginate(3, 12);
                $testimonial = $this->testimonial->findByCategoryId(3);
                break;

            case 'masters':
                $news = $this->news->findByCategoryIdAndPaginate(4, 12);
                $testimonial = $this->testimonial->findByCategoryId(4);
                break;
            
            default:
                $news = 'Default';
                break;
        }
        return view('bulletinboardmanagement::Frontend.News.index')
            ->withNews($news)
            ->withTestimonials($testimonial)
            ->withSeo($this->seo->findByField('page', 'news & update'));
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function show(string $category, string $slug)
    {
        switch ($category) {
            case 'school':
                $news = $this->news->findBySlug($slug);
                $newsList = $this->news->findByCategoryId(1);
                $testimonial = $this->testimonial->findByCategoryId(1);
                break;

            case 'plus-two':
                $news = $this->news->findBySlug($slug);
                $newsList = $this->news->findByCategoryId(2);
                $testimonial = $this->testimonial->findByCategoryId(2);
                break;

            case 'bachelors':
                $news = $this->news->findBySlug($slug);
                $newsList = $this->news->findByCategoryId(3);
                $testimonial = $this->testimonial->findByCategoryId(3);
                break;

            case 'masters':
                $news = $this->news->findBySlug($slug);
                $newsList = $this->news->findByCategoryId(4);
                $testimonial = $this->testimonial->findByCategoryId(4);
                break;
            
            default:
                $newsList = 'Default';
                break;
        }
        return view('bulletinboardmanagement::Frontend.News.show')
            ->withNews($news)
            ->withNewsList($newsList->take(4))
            ->withTestimonials($testimonial);
    }

}
