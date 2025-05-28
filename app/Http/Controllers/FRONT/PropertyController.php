<?php

namespace App\Http\Controllers\FRONT;

use Inertia\Inertia;
use App\Models\House;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB; // Import DB facade

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        // 1. --- DEBUG: Check incoming request data ---
        // dd($request->all()); // UNCOMMENT THIS LINE FOR DEBUGGING (then comment out again)

        $query = House::with(['realtor', 'category', 'creator']);

        // Apply filters from request
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                  ->orWhere('address', 'like', "%{$keyword}%")
                  ->orWhere('short_desc', 'like', "%{$keyword}%");
            });
        }

        if ($request->filled('city')) {
            $query->where('city', $request->input('city'));
        }

        if ($request->filled('category')) {
            $categoryName = $request->input('category');
            $query->whereHas('category', function($q) use ($categoryName) {
                $q->where('name', $categoryName);
            });
        }

        if ($request->filled('offerType')) {
            $query->where('offer_type', $request->input('offerType'));
        }

        if ($request->filled('minPrice') && is_numeric($request->input('minPrice'))) {
            $query->where('price', '>=', (float)$request->input('minPrice'));
        }
        if ($request->filled('maxPrice') && is_numeric($request->input('maxPrice'))) {
            $query->where('price', '<=', (float)$request->input('maxPrice'));
        }

        if ($request->filled('bedrooms')) {
            $bedrooms = $request->input('bedrooms');
            if ($bedrooms === '3+') {
                $query->where('bedroom', '>=', 3);
            } elseif (is_numeric($bedrooms) && (int)$bedrooms > 0) {
                $query->where('bedroom', (int)$bedrooms);
            }
        }

        if ($request->filled('bathrooms')) {
            $bathrooms = $request->input('bathrooms');
            if ($bathrooms === '3+') {
                $query->where('bathroom', '>=', 3);
            } elseif (is_numeric($bathrooms) && (int)$bathrooms > 0) {
                $query->where('bathroom', (int)$bathrooms);
            }
        }

        if ($request->filled('minArea') && is_numeric($request->input('minArea'))) {
            $query->where('size', '>=', (float)$request->input('minArea'));
        }
        if ($request->filled('maxArea') && is_numeric($request->input('maxArea'))) {
            $query->where('size', '<=', (float)$request->input('maxArea'));
        }

        // --- DEBUG: Log SQL Query (before pagination) ---
        // DB::enableQueryLog();

        $houses = $query->latest()->paginate(9)->withQueryString();

        // --- DEBUG: Dump SQL Query Log ---
        // dd(DB::getQueryLog()); // UNCOMMENT THIS LINE FOR DEBUGGING (then comment out again)


        $houses->getCollection()->transform(function ($house) {
            $house->first_image_url = $house->getFirstMedia('house_gallery_images')?->getFullUrl();
            return $house;
        });

        $allCities = House::query()->distinct()->pluck('city')->sort()->values();
        $categories = Category::all();

        return Inertia::render('Front/Property', [
            'houses' => $houses,
            'cities' => $allCities,
            'categories' => $categories,
            'filters' => $request->only(['keyword', 'city', 'category', 'offerType', 'minPrice', 'maxPrice', 'bedrooms', 'bathrooms', 'minArea', 'maxArea']),
        ]);
    }
}