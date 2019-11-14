@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-4">
                        <h4><a href="{{ route('listing.index', [$area, $category]) }}">{{ $category->name }}</a></h4>
                        <hr>
                        
                        @foreach($category->children as $sub)
                            <h5><a href="{{ route('listing.index', [$area, $sub]) }}">{{ $sub->name }} ({{ $sub->listings->count() }})</a></h5>
                        @endforeach

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
