<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CarouselCollection;
use App\model\Carousel;
use App\Http\Controllers\Controller;
use App\Http\Resources\Carousel as CarouselResource;

class CarouselController extends Controller
{
    /**
     * 轮播列表
     * @return CarouselCollection
     */
    public function carouselList() {
        return new CarouselCollection(Carousel::all(['id', 'image']));
    }

    /**
     * 轮播详情
     * @param int $id
     * @return CarouselCollection
     */
    public function carouselDetail($id) {
        return new CarouselResource(Carousel::find($id));
    }
}
