@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create a listing') }}</div>

                <div class="card-body">
					<form action="{{ route('listings.store', [$area]) }}" method="post">
						@csrf
						@include('listings.partials.forms._areas')
						@include('listings.partials.forms._categories')
						<div class="form-group">
						  <label for="title">Title</label>
						  <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror">

						  @error('title')
						      <span class="invalid-feedback" role="alert">
						          <strong>{{ $message }}</strong>
						      </span>
						  @enderror
						</div>

						<div class="form-group">
						  <label for="body">Body</label>
						  <textarea type="text" name="body" id="body" class="form-control @error('body') is-invalid @enderror" cols="30" rows="8"></textarea>

						  @error('body')
						      <span class="invalid-feedback" role="alert">
						          <strong>{{ $message }}</strong>
						      </span>
						  @enderror
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-outline-dark">Save</button>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
@endsection
