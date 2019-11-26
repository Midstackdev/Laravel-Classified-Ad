<?php

namespace App\Http\ViewComposers;

use App\Models\Area;
use Auth;
use Illuminate\View\View;

class NavigationComposer
{
	private $area;

	public function compose(View $view)
	{
		if (!Auth::check()) {
			return $view;
		}

		$user = Auth::user();
		$listings = $user->listings;

		return $view->with([
			'unpublishedListingCount' => $listings->where('live', 0)->count(),
			'publishedListingCount' => $listings->where('live', 1)->count(),
		]);
	}
}