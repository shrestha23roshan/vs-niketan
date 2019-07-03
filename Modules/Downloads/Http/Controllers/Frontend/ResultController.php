<?php

namespace Modules\Downloads\Http\Controllers\Frontend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Downloads\Repositories\Result\ResultRepository;
use Modules\Seo\Repositories\Seo\SeoRepository;

class ResultController extends Controller
{
    private $result;

    private $seo;

    public function __construct(
        ResultRepository $result,
        SeoRepository $seo
    )
    {
        $this->result = $result;
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
                $result = $this->result->getActiveByCategoryId(1);
                break;

            case 'plus-two':
                $result = $this->result->getActiveByCategoryId(2);
                break;

            case 'bachelors':
                $result = $this->result->getActiveByCategoryId(3);
                break;

            case 'masters':
                $result = $this->result->getActiveByCategoryId(4);
                break;
            
            default:
                $result = 'Default';
                break; 
        }
        return view('downloads::Frontend.Result.index')
            ->withResults($result)
            ->withSeo($this->seo->findByField('page', 'results'));
    }

}
