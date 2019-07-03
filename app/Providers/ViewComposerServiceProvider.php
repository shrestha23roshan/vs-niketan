<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     * 
     * @return void
     */
    public function boot()
    {
        view()->composer(
            [
                'layouts.backend.sidebar'
            ],
            'App\Http\ViewComposers\Backend\SidebarComposer'
        );

        view()->composer(
            [
                'layouts.backend.breadcrumb'
            ],
            'App\Http\ViewComposers\Backend\BreadcrumbComposer'
        );

        view()->composer(
            [
                'layouts.frontend.index', 'contentmanagement::Frontend.AboutUs.index',
                'contentmanagement::Frontend.Facility.index',
                'downloads::Frontend.AdmissionForm.index',
                'downloads::Frontend.Result.index',
                'mediamanagement::Frontend.Gallery.index',
                'mediamanagement::Frontend.Gallery.show',
                'mediamanagement::Frontend.Video.index',
                'mediamanagement::Frontend.Video.show',
                'bulletinboardmanagement::Frontend.Event.index',
                'bulletinboardmanagement::Frontend.Event.show',
                'bulletinboardmanagement::Frontend.News.index',
                'bulletinboardmanagement::Frontend.News.show',
                'bulletinboardmanagement::Frontend.Notice.index',
                'bulletinboardmanagement::Frontend.Notice.show',
                'alumni::Frontend.Alumni.index',
                'layouts.frontend.static.extra',
                'layouts.frontend.static.branch',
                
            ],
            'App\Http\ViewComposers\Frontend\BodyComposer'
        );

        view()->composer(
            [
                'layouts.frontend.header'
            ],
            'App\Http\ViewComposers\Frontend\HeaderComposer'
        );

        view()->composer(
            [
                'layouts.frontend.footer'
            ],
            'App\Http\ViewComposers\Frontend\FooterComposer'
        );

        view()->composer(
            [
                'layouts.frontend.nav.bachelors',
                'layouts.frontend.nav.school',
                'layouts.frontend.nav.masters',
                'layouts.frontend.nav.plus-two'
            ],
            'App\Http\ViewComposers\Frontend\NavComposer'
        );

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}