<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Jobs\UserViewedListing;
use App\Models\{Area, Category, Listing};
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index(Area $area, Category $category)
    {
    	$listings = Listing::with(['user', 'area', 'viewedUsers'])->isLive()->inArea($area)->fromCategory($category)->latestFirst()->paginate(10);

    	return view('listings.index', compact('listings', 'category'));
    }

    public function show(Request $request, Area $area, Listing $listing)
    {
    	if (!$listing->live()) {
    		abort(404);
    	}

        if ($request->user()) {
            dispatch(new UserViewedListing($request->user(), $listing));
        }

    	return view('listings.show', compact('listing'));
    }
}
