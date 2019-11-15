<div class="form-group">
	<label for="area">Area</label>
	<select name="area_id" id="area" class="form-control @error('area_id') is-invalid @enderror"
	{{ isset($listing) && $listing->live() ? 'disabled' : ''}}>
		@foreach($areas as $country)
			<optgroup label="{{ $country->name }}">
				@foreach($country->children as $state)
					<optgroup label="{{ $state->name }}">
						@foreach($state->children as $city)

							@if(
								isset($listing) && $listing->area->id === $city->id ||
								!isset($listing) && $area->id == $city->id && !old('area_id') ||
								old('area_id') == $city->id
							)
								<option value="{{ $city->id }}" selected>{{ $city->name }}</option>
							@else	
								<option value="{{ $city->id }}">{{ $city->name }}</option>
							@endif	
						@endforeach
					</optgroup>
				@endforeach
			</optgroup>
		@endforeach
	</select>

	@error('area_id')
	    <span class="invalid-feedback" role="alert">
	        <strong>{{ $message }}</strong>
	    </span>
	@enderror
</div>