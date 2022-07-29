<div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-4">
	@foreach($photos as $photo)
	<div class="card mr-2" >
		<div class="absolute mt-1 ml-1">
    <input type="checkbox" name="photo_select[]" value="{{ $photo->id }}" class="checkbox" />
    </div>
								<img  class="card-img-top"  src="{{ asset('photos/'.$photo->photo_name) }}" \/>
		
	</div>
	@endforeach
</div>