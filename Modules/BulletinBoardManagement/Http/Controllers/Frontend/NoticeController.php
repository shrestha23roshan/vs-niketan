<?php

namespace Modules\BulletinBoardManagement\Http\Controllers\Frontend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\BulletinBoardManagement\Repositories\Notice\NoticeRepository;
use Modules\Testimonial\Repositories\Testimonial\TestimonialRepository;

class NoticeController extends Controller
{
    private $notice;

    private $testimonial;

    public function __construct(
        NoticeRepository $notice,
        TestimonialRepository $testimonial
    )
    {
        $this->notice = $notice;
        $this->testimonial = $testimonial;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(string $category)
    {
        switch ($category) {
            case 'school':
                $notice = $this->notice->findByCategoryIdAndPaginate(1, 16);
                $testimonial = $this->testimonial->findByCategoryId(1);
                break;

            case 'plus-two':
                $notice = $this->notice->findByCategoryIdAndPaginate(2, 16);
                $testimonial = $this->testimonial->findByCategoryId(2);
                break;

            case 'bachelors':
                $notice = $this->notice->findByCategoryIdAndPaginate(3, 16);
                $testimonial = $this->testimonial->findByCategoryId(3);
                break;

            case 'masters':
                $notice = $this->notice->findByCategoryIdAndPaginate(4, 16);
                $testimonial = $this->testimonial->findByCategoryId(4);
                break;
            
            default:
                $notice = 'Default';
                break;
        }
        return view('bulletinboardmanagement::Frontend.Notice.index')
            ->withNotices($notice)
            ->withTestimonials($testimonial);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function show(string $category, string $slug)
    {
        switch ($category) {
            case 'school':
                $notice = $this->notice->findBySlug($slug);
                $noticeList = $this->notice->findByCategoryId(1);
                $testimonial = $this->testimonial->findByCategoryId(1);
                break;

            case 'plus-two':
                $notice = $this->notice->findBySlug($slug);
                $noticeList = $this->notice->findByCategoryId(2);
                $testimonial = $this->testimonial->findByCategoryId(2);
                break;

            case 'bachelors':
                $notice = $this->notice->findBySlug($slug);
                $noticeList = $this->notice->findByCategoryId(3);
                $testimonial = $this->testimonial->findByCategoryId(3);
                break;

            case 'masters':
                $notice = $this->notice->findBySlug($slug);
                $noticeList = $this->notice->findByCategoryId(4);
                $testimonial = $this->testimonial->findByCategoryId(4);
                break;
            
            default:
                $noticeList = 'Default';
                break;
        }
        return view('bulletinboardmanagement::Frontend.Notice.show')
            ->withNotice($notice)
            ->withNoticeList($noticeList->take(4))
            ->withTestimonials($testimonial);
    }

}
