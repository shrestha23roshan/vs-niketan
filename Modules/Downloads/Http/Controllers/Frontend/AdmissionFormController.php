<?php

namespace Modules\Downloads\Http\Controllers\Frontend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Downloads\Repositories\AdmissionForm\AdmissionFormRepository;
use Modules\Seo\Repositories\Seo\SeoRepository;

class AdmissionFormController extends Controller
{
    private $admissionForm;

    private $seo;

    public function __construct(
        AdmissionFormRepository $admissionForm,
        SeoRepository $seo
    )
    {
        $this->admissionForm = $admissionForm;
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
                $admissionForm = $this->admissionForm->getActiveByCategoryId(1);
                break;

            case 'plus-two':
                $admissionForm = $this->admissionForm->getActiveByCategoryId(2);
                break;

            case 'bachelors':
                $admissionForm = $this->admissionForm->getActiveByCategoryId(3);
                break;

            case 'masters':
                $admissionForm = $this->admissionForm->getActiveByCategoryId(4);
                break;
            
            default:
                $admissionForm = 'Default';
                break;
        }

        return view('downloads::Frontend.AdmissionForm.index')
            ->withAdmissionForm($admissionForm)
            ->withSeo($this->seo->findByField('page', 'admission form'));
    }

}
