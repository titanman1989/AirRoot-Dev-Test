<div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-6 lg:grid-cols-6 xl:grid-cols-6 gap-1">
	@foreach($photos as $photo)
	<div class="center-cropped-select item-image item-image-loaded " style="background-image:url({{ getPhoto($photo->photo_name) }});">
							<div class="absolute mt-2 ml-2 " >
								<input type="checkbox" data-theme="halloween" name="photo_select[]"  value="{{ $photo->id }}" class="checkbox" />
							</div>
							
						</div>
	@endforeach
</div>

