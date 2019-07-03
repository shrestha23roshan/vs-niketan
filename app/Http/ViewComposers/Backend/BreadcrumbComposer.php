<?php

namespace App\Http\ViewComposers\Backend;

use Illuminate\View\View;
use Modules\Configuration\Repositories\User\UserRepository;

use Auth;
use Route;

class BreadcrumbComposer
{
    /** 
     * The UserRepository instance.
     * 
     * @var UserRepository
     */
    protected $user;

    public function __construct(
        UserRepository $user
    )
    {
        $this->user = $user;
    }

    public function compose(View $view)
    {
        $slug = request()->route()->getName() ? str_replace('.index', '', request()->route()->getName()) : '';
        $arr = explode(".", $slug);
        for($i=0; $i<count($arr); $i++){
            $str = '';
            for($j=0; $j<=$i; $j++){
                $str .= $arr[$j] .'.';
                $breadcrumbs[$i]['name'] = $arr[$j];
            }

            if(Route::has($str .'index')){
                $breadcrumbs[$i]['slug'] = $str .'index';
            }
        }
        $view->withBreadcrumbs($breadcrumbs);
    }
}