@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Share a listing') }} <em>{{ $listing->title }}</em></div>

                <div class="card-body">
					<p>Share this listing with up to 5 people</p>

					<form action="{{ route('listing.share.store', [$area, $listing]) }}" method="post">
						@csrf
						@foreach (range(0, 4) as $n)
							<div class="form-group">
								<label for="emails.{{$n}}" class="d-none">Email</label>
								<input type="text" name="emails[]" id="emails.{{$n}}" class="form-control @error('emails.' .$n) is-invalid @enderror" placeholder="example@gmail.com" value="{{ old('emails.' .$n) }}">
								@error('emails.' .$n)
								    <span class="invalid-feedback" role="alert">
								        <strong>{{ $message }}</strong>
								    </span>
								@enderror
							</div>

						@endforeach
						
						<div class="form-group">
							<label for="message">Message (optional)</label>
							<textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
						</div>	
						
						<div class="form-group">
							<button type="submit" class="btn btn-outline-secondary">Send</button>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
@endsection
