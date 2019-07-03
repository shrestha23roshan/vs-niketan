<?php
namespace Modules\Testimonial\Repositories\Testimonial;

interface TestimonialRepository
{
    public function all();

    public function findByCategoryId($id);

    public function getAllByCategoryId($id);
}