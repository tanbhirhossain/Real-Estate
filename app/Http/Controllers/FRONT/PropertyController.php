<?php

namespace App\Http\Controllers\Front;

use Inertia\Inertia;
use App\Models\House;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
    public function index()
    {
        $houses = House::with(['realtor', 'category', 'creator'])->get();
        $cities = $houses->pluck('city');
        $categories = Category::all();
         $houses->transform(function ($house) {
            $house->first_image_url = $house->getFirstMedia('house_gallery_images')?->getFullUrl();
            return $house;
        });
        return Inertia::render('Front/Property', compact('houses', 'cities', 'categories'));
    }
}
