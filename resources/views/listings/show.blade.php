@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	@if(Auth::check())
			<div class="col-md-3">
				<ul class="nav flex-column nav-pills">
				  <li class="nav-item">
				    <a class="nav-link active" href="#">Email a friend</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="#">Add to favourite</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="#">Link</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
				  </li>
				</ul>
			</div>
		@endif
		<div class="{{ Auth::check() ? 'col-md-9' : 'col-md-12'}}">
			<div class="card mb-4">
				<div class="card-header">
					<h4>{{ $listing->title }} in <span class="text-muted">{{ $listing->area->name }}</span></h4>
				</div>
				<div class="card-body">
					{!! nl2br(e($listing->body)) !!}
					<hr>
					<p>Viewed x times</p>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					Contact {{ $listing->user->name }}
				</div>
				<div class="card-body">
					@if (Auth::guest())
						<p><a href="/register">Sign up</a> for an account or <a href="/login">sign in</a> to contact listing owners</p>
					@else
						<form action="" method="post">
							<div class="form-group">
								<label for="message">Message</label>
								<textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-outline-primary">Send</button>
								<span class="form-text text-muted">
									This will email {{ $listing->user->name }} and they'll be able to reply directly to you by email.
								</span>
							</div>

							@csrf
						</form>
					@endif
				</div>
			</div>
		</div>
    </div>
</div>
@endsection