Hi {{ $listing->user->name }}, <br><br>

{{ $sender->name }} has shared with you a listing, <a href="{{ route('listing.show', [$listing->area, $listing]) }}">{{ $listing->title }}</a>. <br><br>

----------- <br>

{!! nl2br(e($body)) !!} <br>

----------- <br><br>

Reply directly to this email to get back to them.