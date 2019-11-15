<?php

namespace App\Http\Controllers\Listing;

use App\Models\{Area, Category, Listing};
use App\Mail\{ListingContactCreated};
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingContactFormRequest;
use Illuminate\Http\Request;
use Mail;

class ListingContactController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth']);
	}

    public function store(StoreListingContactFormRequest $request, Area $area, Listing $listing)
    {
    	Mail::to($listing->user)->queue(
    		new ListingContactCreated($listing, $request->user(), $request->message)
    	);

    	return back()->withSuccess("We have send your message to {$listing->user->name}");
    }
}
