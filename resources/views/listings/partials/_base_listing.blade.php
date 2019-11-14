<div class="media mb-3">
  <img src="https://via.placeholder.com/64" class="mr-3" alt="{{ $listing->title }}">
  <div class="media-body">
    <h5 class="mt-0">
    	<strong><a href="{{ route('listing.show', [$area, $listing]) }}">{{ $listing->title }}</a></strong>
    	@if($area->children->count())
			in {{ $listing->area->name }}
    	@endif
    </h5>
    <ul class="list-inline">
    	<li class="list-inline-item">{{ $listing->created_at->diffForHumans() }}</li>
      <li class="list-inline-item">{{ $listing->user->name }}</li>
    	<li class="list-inline-item">{{ $listing->views() }} {{Str::plural('view', $listing->views())}}</li>
    </ul>
   {{ $links }}
  </div>
</div>
