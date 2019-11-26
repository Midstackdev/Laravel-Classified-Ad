@extends('layouts.app')

@section('content')
    @if($listings->count())
        
        @each('listings.partials._listing_own', $listings, 'listing')
       

        {{ $listings->links() }}
    @else
        <p class="lead">No published listings.</p>
    @endif
@endsection