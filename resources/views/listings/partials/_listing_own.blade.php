<div class="media mb-3">
  <img src="https://via.placeholder.com/64" class="mr-3" alt="">
  <div class="media-body">
    <h5 class="mt-0">
    	<strong>
    		@if($listing->live())
				<a href="{{ route('listing.show', [$area, $listing]) }}">{{ $listing->title }}</a>
    		@else
				{{ $listing->title }}
    		@endif
    	</strong>

    	in {{ $listing->area->name }}
    </h5>
    <ul class="list-inline mb-0">
    	<li class="list-inline-item">{{ $listing->created_at->diffForHumans() }}</li>
      	<li class="list-inline-item">Last updated <time>{{ $listing->updated_at->diffForHumans() }}</time></li>
    </ul>
    <ul class="list-inline">
    	<li class="list-inline-item">
        <a href="#" onclick="event.preventDefault(); document.getElementById('listings-destroy-form-{{$listing->id }}').submit();">Remove</a>
      </li>
      	<li class="list-inline-item"><a href="{{ route('listings.edit', [$area, $listing])}}">Edit</a></li>
    </ul>
   
  </div>
</div>

<form action="{{ route('listings.destroy', [$area, $listing]) }}" method="post" id="listings-destroy-form-{{$listing->id }}">
  @csrf
  @method('delete')
</form>