<?php

namespace App\Http\ViewComposers\Frontend;

use Illuminate\View\View;
use Modules\MediaManagement\Repositories\Banner\BannerRepository;
use Modules\ContentManagement\Repositories\Message\MessageRepository;
use Modules\BulletinBoardManagement\Repositories\Event\EventRepository;
use Modules\BulletinBoardManagement\Repositories\Notice\NoticeRepository;
use Modules\BulletinBoardManagement\Repositories\News\NewsRepository;
use Modules\ContentManagement\Repositories\AboutUs\AboutUsRepository;
use Modules\ContentManagement\Repositories\Achievement\AchievementRepository;
use Modules\Testimonial\Repositories\Testimonial\TestimonialRepository;
use Modules\ContentManagement\Repositories\Facility\FacilityRepository;
use Modules\Settings\Repositories\Setting\SettingRepository;

class BodyComposer
{
    private $banner;

    private $message;

    private $event;

    private $notice;

    private $aboutUs;

    private $news;

    private $achievement;

    private $testimonial;

    private $facilities;

    private $setting;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        BannerRepository $banner,
        MessageRepository $message,
        EventRepository $event,
        NoticeRepository $notice,
        AboutUsRepository $aboutUs,
        NewsRepository $news,
        AchievementRepository $achievement,
        TestimonialRepository $testimonial,
        FacilityRepository $facilities,
        SettingRepository $setting
    )
    {
        $this->banner = $banner;
        $this->message = $message;
        $this->event = $event;
        $this->notice = $notice;
        $this->aboutUs = $aboutUs;
        $this->news = $news;
        $this->achievement = $achievement;
        $this->testimonial = $testimonial;
        $this->facilities = $facilities;
        $this->setting = $setting;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function compose(View $view)
    {
        $view->withHighSchoolBanners($this->banner->findByCategoryId(1))
            ->withHighSchoolMessages($this->message->find(1))
            ->withHighSchoolEvents($this->event->findByCategoryId(1)->take(1))
            ->withHighSchoolNotices($this->notice->findByCategoryId(1)->take(3))
            ->withHighSchoolAboutUs($this->aboutUs->find(1))
            ->withHighSchoolNews($this->news->findByCategoryId(1)->take(3))
            ->withHighSchoolTestimonials($this->testimonial->findByCategoryId(1))

            ->withPlusTwoBanners($this->banner->findByCategoryId(2))
            ->withPlusTwoMessages($this->message->find(2))
            ->withPlusTwoEvents($this->event->findByCategoryId(2))
            ->withPlusTwoNotices($this->notice->findByCategoryId(2)->take(3))
            ->withPlusTwoAboutUs($this->aboutUs->find(2))
            ->withPlusTwoNews($this->news->findByCategoryId(2)->take(3))
            ->withPlusTwoTestimonials($this->testimonial->findByCategoryId(2))

            ->withBachelorBanners($this->banner->findByCategoryId(3))
            ->withBachelorMessages($this->message->find(3))
            ->withBachelorEvents($this->event->findByCategoryId(3))
            ->withBachelorNotices($this->notice->findByCategoryId(3)->take(3))
            ->withBachelorAboutUs($this->aboutUs->find(3))
            ->withBachelorNews($this->news->findByCategoryId(3)->take(3))
            ->withBachelorTestimonials($this->testimonial->findByCategoryId(3))

            ->withMasterBanners($this->banner->findByCategoryId(4))
            ->withMasterMessages($this->message->find(4))
            ->withMasterEvents($this->event->findByCategoryId(4))
            ->withMasterNotices($this->notice->findByCategoryId(4)->take(3))
            ->withMasterAboutUs($this->aboutUs->find(4))
            ->withMasterNews($this->news->findByCategoryId(4)->take(3))
            ->withMasterTestimonials($this->testimonial->findByCategoryId(4))
           

            ->withAchievements($this->achievement->find(1))
            ->withFacilities($this->facilities->getLatest()->take(6))
            ->withSetting($this->setting->getSetting());
    }
}