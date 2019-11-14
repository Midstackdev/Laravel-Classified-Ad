@extends('layouts.app')

@section('content')
    @if($listings->count())
        @foreach($listings as $listing)
            @include('listings.partials._listing_favourite', compact('listing'))
        @endforeach

        {{ $listings->links() }}
    @else
        <p class="lead">No favourite listings.</p>
    @endif
@endsection