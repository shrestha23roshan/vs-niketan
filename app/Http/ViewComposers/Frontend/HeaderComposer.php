<?php

namespace App\Http\ViewComposers\Frontend;

use Illuminate\View\View;
use Modules\Settings\Repositories\Setting\SettingRepository;

class HeaderComposer
{
    private $setting;

    /**
     * Create a new sidebar composer.
     *
     * @return void
     */
    public function __construct(
      SettingRepository $setting
    )
    {
        $this->setting = $setting;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
       $view->withSetting($this->setting->getSetting());
    }
}
