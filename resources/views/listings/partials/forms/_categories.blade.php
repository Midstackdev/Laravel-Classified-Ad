<div class="form-group">
	<label for="category">Category</label>
	<select name="category_id" id="category" class="form-control @error('category_id') is-invalid @enderror"
	{{ isset($listing) && $listing->live() ? 'disabled' : ''}}>
		@foreach($categories as $category)
			<optgroup label="{{ $category->name }}">
				@foreach($category->children as $child)

					@if(isset($listing) && $listing->category_id == $child->id || old('category_id') == $child->id)
						<option value="{{ $child->id }}" selected>{{ $child->name }} (${{ number_format($child->price, 2) }})</option>
					@else	
						<option value="{{ $child->id }}">{{ $child->name }} (${{ number_format($child->price, 2) }})</option>
					@endif	
				@endforeach
			</optgroup>
		@endforeach
	</select>

	@error('category_id')
	    <span class="invalid-feedback" role="alert">
	        <strong>{{ $message }}</strong>
	    </span>
	@enderror
</div>