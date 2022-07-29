
<x-app-layout>
<x-slot name="header">
<div class="text-sm breadcrumbs">
	<ul>
		<li>
			<a href="/albums"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Albums') }} </h2></a>
		</li>
		<li>{{ $albums->album_name }}</li>
		
	</ul>
</div>
{{--  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{ __('Albums') }}. {{ $albums->album_name }}
</h2> --}}
</x-slot>
{{--     <x-dashboard-card>
<div id="dropzone">
	<form action="{{ route('image.store') }}" class="dropzone" id="file-upload" enctype="multipart/form-data">
		@csrf
		<div class="dz-message">
			Drag and Drop Single/Multiple Files Here<br>
		</div>
	</form>
</div>
</x-dashboard-card> --}}
<div class="py-12" >
	<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
		<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
			<div class="p-6 bg-white border-b border-gray-200">
				
				<div class="grid grid-cols-2 gap-2 ">
					
					<div class="" ><h1 class="font-semibold text-lg text-gray-800 leading-tight">{{ $albums->album_name }}</h1> </div>
					<div class="flex justify-end gap-3" >
						<div class="tooltip tooltip-bottom" data-tip="Add Photo">
							<button  class="btn  btn-circle btn-outline  loadPhoto" data-tip="Add Photo">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
							</svg>
							</button>
						</div>
						<div class="tooltip tooltip-error tooltip-bottom div-delete-photo" data-tip="Delete Photo">
							<button  class="btn btn-circle btn-outline btn-error delete-photo">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
								<path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4" />
							</svg>
							</button>
						</div>
					</div>
				</div>
				<div class="size text-sm text-gray-400 mt-16">
					@php
					$sizeToal = 0;
					@endphp
					@foreach ($size as $key => $size_)
					{{ $size_->photo_mime }} = {{ round($size_->size / (1000 * 1024), 2) . ' MB'  }}
					@php
					$sizeToal  +=$size_->size;
					@endphp
					@endforeach
					<span class="float-right">Total : {{ round($sizeToal / (1000 * 1024), 2) . ' MB'  }}</span>
				</div>
				<div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
					@foreach($photos as $photo)
					<div class="card drop-shadow-md photo-box photo-id-{{ $photo->id }}" data-theme="garden">
						<div class="center-cropped item-image item-image-loaded " style="background-image:url({{ asset('photos/'.$photo->photo_name) }});">
							<div class="absolute mt-2 ml-2 checkbox_photo_select" >
								<input type="checkbox" data-theme="halloween" name="photo_select"  value="{{ $photo->id }}" class="checkbox" />
							</div>
							
						</div>
						
					</div>
					@endforeach
				</div>
				
				
				
			</div>
		</div>
	</div>
</div>
</x-app-layout>
<input type="checkbox" id="my-modal-3" class="modal-toggle" />
<div class="modal">
	<div class="modal-box w-full max-w-5xl">
		<label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
		<h3 class="font-bold text-lg">Congratulations random Internet user!</h3>
		<form method="post" class="add_photo" action="/save-photo-album" >
			@csrf
			<input type="hidden" value="{{  $albums->id }}" name="albums_id">
			<div class="show-photo"></div>
			
			<div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
				<button type="submit" class="btn btn-accent add_photo">Add Photo</button>
				<button data-modal-toggle="defaultModal" class="btn btn-error">Decline</button>
			</div>
		</form>
	</div>
</div>


</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
$(document).ready(function() {
	
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
	$('.loadPhoto').on('click', function(event) {
	event.preventDefault();
	
			$.get('/get-photo-user', function(data) {
				$('.show-photo').html(data)
				document.getElementById('my-modal-3').checked = true;
			});
});
$('.photo-box').hover(function(){
$('.checkbox_photo_select').show('400');
			
},function(){
	var n = $( "input:checked" ).length;
	if (n == 0 ) {
		$('.checkbox_photo_select').hide('400');
		$('.div-delete-photo').hide('400');
	}else{
			$('.div-delete-photo').show('400');
	}
});
$('.delete-photo').on('click',  function(event) {
	event.preventDefault();
	var photo = [];
$.each($("input[name='photo_select']:checked"), function(){
// photo.push($(this).val());
var id = $(this).val();
$.ajax({
type: "DELETE",
url: '/image-de/'+id ,
success: function (result) {
$('.photo-id-'+id ).remove()
}
});
});


});
	

	
});
// $('.add_photo').on('click',  function(event) {
		// 	event.preventDefault();
	
// });
</script>