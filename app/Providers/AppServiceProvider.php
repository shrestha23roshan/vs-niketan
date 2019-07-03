<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryEloquent;
use Modules\Configuration\Repositories\User\UserRepository;
use Modules\Configuration\Repositories\User\UserRepositoryEloquent;
use Modules\Configuration\Repositories\Role\RoleRepository;
use Modules\Configuration\Repositories\Role\RoleRepositoryEloquent;
use Modules\Configuration\Repositories\Module\ModuleRepository;
use Modules\Configuration\Repositories\Module\ModuleRepositoryEloquent;
use Modules\ContentManagement\Repositories\AboutUs\AboutUsRepository;
use Modules\ContentManagement\Repositories\AboutUs\AboutUsRepositoryEloquent;
use Modules\ContentManagement\Repositories\Message\MessageRepository;
use Modules\ContentManagement\Repositories\Message\MessageRepositoryEloquent;
use Modules\ContentManagement\Repositories\Achievement\AchievementRepository;
use Modules\ContentManagement\Repositories\Achievement\AchievementRepositoryEloquent;
use Modules\MediaManagement\Repositories\Banner\BannerRepository;
use Modules\MediaManagement\Repositories\Banner\BannerRepositoryEloquent;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryEloquent;
use Modules\MediaManagement\Repositories\Gallery\GalleryRepository;
use Modules\MediaManagement\Repositories\Gallery\GalleryRepositoryEloquent;
use Modules\MedaiManagement\Repositories\GalleryPhoto\GalleryPhotoRepository;
use Modules\MedaiManagement\Repositories\GalleryPhoto\GalleryPhotoRepositoryEloquent;
use Modules\MediaManagement\Repositories\Video\VideoRepository;
use Modules\MediaManagement\Repositories\Video\VideoRepositoryEloquent;
use Modules\BulletinBoardManagement\Repositories\News\NewsRepository;
use Modules\BulletinBoardManagement\Repositories\News\NewsRepositoryEloquent;
use Modules\BulletinBoardManagement\Repositories\Notice\NoticeRepository;
use Modules\BulletinBoardManagement\Repositories\Notice\NoticeRepositoryEloquent;
use Modules\Testimonial\Repositories\Testimonial\TestimonialRepository;
use Modules\Testimonial\Repositories\Testimonial\TestimonialRepositoryEloquent;
use Modules\Alumni\Repositories\Alumni\AlumniRepository;
use Modules\Alumni\Repositories\Alumni\AlumniRepositoryEloquent;
use Modules\Downloads\Repositories\AdmissionForm\AdmissionFormRepository;
use Modules\Downloads\Repositories\AdmissionForm\AdmissionFormRepositoryEloquent;
use Modules\Downloads\Repositories\Result\ResultRepository;
use Modules\Downloads\Repositories\Result\ResultRepositoryEloquent;
use Modules\Settings\Repositories\Setting\SettingRepository;
use Modules\Settings\Repositories\Setting\SettingRepositoryEloquent;
use Modules\Seo\Repositories\Seo\SeoRepository;
use Modules\Seo\Repositories\Seo\SeoRepositoryEloquent;
use Modules\BulletinBoardManagement\Repositories\Event\EventRepository;
use Modules\BulletinBoardManagement\Repositories\Event\EventRepositoryEloquent;
use Modules\ContentManagement\Repositories\Facility\FacilityRepository;
use Modules\ContentManagement\Repositories\Facility\FacilityRepositoryEloquent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultstringlength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            BaseRepository::class,
            BaseRepositoryEloquent::class
        );
        $this->app->singleton(
            UserRepository::class,
            UserRepositoryEloquent::class
        );
        $this->app->singleton(
            RoleRepository::class,
            RoleRepositoryEloquent::class
        );
        $this->app->singleton(
            ModuleRepository::class,
            ModuleRepositoryEloquent::class
        );
        $this->app->singleton(
            AboutUsRepository::class,
            AboutUsRepositoryEloquent::class
        );
        $this->app->singleton(
            MessageRepository::class,
            MessageRepositoryEloquent::class
        );
        $this->app->singleton(
            AchievementRepository::class,
            AchievementRepositoryEloquent::class
        );
        $this->app->singleton(
            BannerRepository::class,
            BannerRepositoryEloquent::class
        );
        $this->app->singleton(
            CategoryRepository::class,
            CategoryRepositoryEloquent::class
        );
        $this->app->singleton(
            GalleryRepository::class,
            GalleryRepositoryEloquent::class
        );
        $this->app->singleton(
            GalleryPhotoRepository::class,
            GalleryPhotoRepositoryEloquent::class
        );
        $this->app->singleton(
            VideoRepository::class,
            VideoRepositoryEloquent::class
        );
        $this->app->singleton(
            NewsRepository::class,
            NewsRepositoryEloquent::class
        );
        $this->app->singleton(
            NoticeRepository::class,
            NoticeRepositoryEloquent::class
        );
        $this->app->singleton(
            TestimonialRepository::class,
            TestimonialRepositoryEloquent::class
        );
        $this->app->singleton(
            AlumniRepository::class,
            AlumniRepositoryEloquent::class
        );
        $this->app->singleton(
            AdmissionFormRepository::class,
            AdmissionFormRepositoryEloquent::class
        );
        $this->app->singleton(
            ResultRepository::class,
            ResultRepositoryEloquent::class
        );
        $this->app->singleton(
            SettingRepository::class,
            SettingRepositoryEloquent::class
        );
        $this->app->singleton(
            SeoRepository::class,
            SeoRepositoryEloquent::class
        );
        $this->app->singleton(
            EventRepository::class,
            EventRepositoryEloquent::class
        );
        $this->app->singleton(
            FacilityRepository::class,
            FacilityRepositoryEloquent::class
        );
    }
}
