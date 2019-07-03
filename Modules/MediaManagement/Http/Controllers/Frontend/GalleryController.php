<?php

namespace Modules\MediaManagement\Http\Controllers\Frontend;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\MediaManagement\Repositories\Gallery\GalleryRepository;
use Modules\MedaiManagement\Repositories\GalleryPhoto\GalleryPhotoRepository;
use Modules\Testimonial\Repositories\Testimonial\TestimonialRepository;
use Modules\Seo\Repositories\Seo\SeoRepository;

class GalleryController extends Controller
{
    private $gallery;

    private $galleryPhoto;

    private $testimonial;

    private $seo;

    public function __construct(
        GalleryRepository $gallery,
        GalleryPhotoRepository $galleryPhoto,
        TestimonialRepository $testimonial,
        SeoRepository $seo
    )
    {
        $this->gallery = $gallery;
        $this->galleryPhoto = $galleryPhoto;
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
                $gallery = $this->gallery->findByCategoryIdAndPaginate(1, 16);
                $testimonial = $this->testimonial->findByCategoryId(1);
                break;

            case 'plus-two':
                $gallery = $this->gallery->findByCategoryIdAndPaginate(2, 16);
                $testimonial = $this->testimonial->findByCategoryId(2);
                break;

            case 'bachelors':
                $gallery = $this->gallery->findByCategoryIdAndPaginate(3, 16);
                $testimonial = $this->testimonial->findByCategoryId(3);
                break;

            case 'masters':
                $gallery = $this->gallery->findByCategoryIdAndPaginate(4, 16);
                $testimonial = $this->testimonial->findByCategoryId(4);
                break;
            
            default:
                $gallery = 'Default';
                break;
        }
        return view('mediamanagement::Frontend.Gallery.index')
            ->withGalleries($gallery)
            ->withTestimonials($testimonial)
            ->withSeo($this->seo->findByField('page', 'images'));
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function show(string $category, string $slug)
    {
        switch ($category) {
            case 'school':
                $gallary = $this->gallery->findBySlug($slug);
                $photos = $this->galleryPhoto->findByGalleryId($gallary->id);
                break;

            case 'plus-two':
                $gallary = $this->gallery->findBySlug($slug);
                $photos = $this->galleryPhoto->findByGalleryId($gallary->id);
                break;

            case 'bachelors':
                $gallary = $this->gallery->findBySlug($slug);
                $photos = $this->galleryPhoto->findByGalleryId($gallary->id);
                break;

            case 'masters':
                $gallary = $this->gallery->findBySlug($slug);
                $photos = $this->galleryPhoto->findByGalleryId($gallary->id);
                break;
            
            default:
                $photos = 'Default';
                break;
        }
        return view('mediamanagement::Frontend.Gallery.show')
            ->withPhotos($photos);
    }

}
