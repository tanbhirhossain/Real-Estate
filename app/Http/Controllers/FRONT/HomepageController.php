<?php

namespace App\Http\Controllers\FRONT;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\House;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomepageController extends Controller
{
    public function index()
    {
        $houses = House::with(['realtor', 'category', 'creator'])->where('isHome', 1)->get();
        $cities = $houses->pluck('city');
        $categories = Category::all();
         $houses->transform(function ($house) {
            $house->first_image_url = $house->getFirstMedia('house_gallery_images')?->getFullUrl();
            return $house;
        });
        return Inertia::render('Front/Home', compact('houses', 'cities', 'categories'));
    }

   public function roomDetails($slug)
    {
        $house = House::with(['realtor', 'category', 'creator', 'features'])->where('slug', $slug)->first();
        $house->first_image_url = $house->getFirstMedia('house_gallery_images')?->getFullUrl();
        $galleryImages = $house->getMedia('house_gallery_images')->map(function ($media) {
            return [
                'url' => $media->getFullUrl(),
                'name' => $media->name,
            ];
        });

        return Inertia::render('Front/RoomDetails', [
            'house' => $house,
            'galleryImages' => $galleryImages,
        ]);
    }

}
