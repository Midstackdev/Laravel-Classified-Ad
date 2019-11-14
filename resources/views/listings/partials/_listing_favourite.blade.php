@component('listings.partials._base_listing', compact('listing'))
	@slot('links')
		<ul class="list-inline">
			<li class="list-inline-item">
				Added {{ $listing->pivot->created_at->diffForHumans() }}
			</li>
			<li class="list-inline-item">
				<a href="#" onclick="event.preventDefault(); document.getElementById('favourite-delete-form-{{ $listing->id}}').submit();">Delete</a>
			</li>
		</ul>
		<form action="{{ route('listings.favourites.destroy', [$area, $listing]) }}" method="post" id="favourite-delete-form-{{ $listing->id}}">
			@csrf
			@method('delete')
		</form>
	@endslot
@endcomponent