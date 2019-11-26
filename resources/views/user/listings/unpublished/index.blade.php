@extends('layouts.app')

@section('content')
    @if($listings->count())
        
        @each('listings.partials._listing_own', $listings, 'listing')
       

        {{ $listings->links() }}
    @else
        <p class="lead">No unpublished listings.</p>
    @endif
@endsection