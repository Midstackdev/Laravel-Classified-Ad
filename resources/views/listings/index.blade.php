@extends('layouts.app')

@section('content')
    <h4>{{ $category->parent->name}} &nbsp; > &nbsp; {{ $category->name }}</h4>
    <hr>

    @if($listings->count())
        @foreach($listings as $listing)
            @include('listings.partials._listing', compact('listing'))
        @endforeach

        {{ $listings->links() }}
    @else
        <p class="lead">No listing found.</p>
    @endif
@endsection