@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	{{ __('Continue editing listing') }}
                	@if($listing->live())
						<span class="float-right"><a href="{{ route('listing.show', [$area, $listing]) }}">Got to listing</a></span>
                	@endif
                </div>

                <div class="card-body">
					<form action="{{ route('listings.update', [$area, $listing]) }}" method="post">
						@csrf
						@method('patch')
						@include('listings.partials.forms._areas')
						@include('listings.partials.forms._categories')
						<div class="form-group">
						  <label for="title">Title</label>
						  <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" 
						  value="{{ $listing->title }}">

						  @error('title')
						      <span class="invalid-feedback" role="alert">
						          <strong>{{ $message }}</strong>
						      </span>
						  @enderror
						</div>

						<div class="form-group">
						  <label for="body">Body</label>
						  <textarea type="text" name="body" id="body" class="form-control @error('body') is-invalid @enderror" cols="30" rows="8">{{ $listing->body }}</textarea>

						  @error('body')
						      <span class="invalid-feedback" role="alert">
						          <strong>{{ $message }}</strong>
						      </span>
						  @enderror
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-outline-dark">Save</button>
						</div>

						@if($listing->live())
							<input type="hidden" name="category_id" value="{{ $listing->category_id }}">
						@endif
					</form>
                </div>
            </div>
        </div>
    </div>
@endsection
