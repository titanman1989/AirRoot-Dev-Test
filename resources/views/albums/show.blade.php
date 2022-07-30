
<x-app-layout>
<x-slot name="header">
<div class="text-sm breadcrumbs">
	

	<nav class="flex" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-3">
    <li class="inline-flex items-center">
      <a href="/albums" class="inline-flex items-center text-xl font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
        
      {{ __('Albums') }}
      </a>
    </li>
    <li>
      <div class="flex items-center">
        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">{{ $albums->album_name }}</a>
      </div>
    </li>
    
  </ol>
</nav>
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
						<div >
						
							<button data-tooltip-target="tooltip-add"  class=" loadPhoto relative inline-flex items-center p-0.5 justify-center  overflow-hidden text-sm font-medium text-gray-900 rounded-full group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
						  <span class="relative p-2.5 transition-all ease-in duration-75 bg-white text-blue-700 dark:bg-gray-900 rounded-full  hover:text-white group-hover:bg-opacity-0">
						     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
													<path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
												</svg>
						  </span>
						</button>

							<div id="tooltip-add" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
							   Add Photo
							    <div class="tooltip-arrow" data-popper-arrow></div>
							</div>

						</div>
						<div class="div-delete-photo">
								<button id="tooltip-delete-btn"  data-tooltip-target="tooltip-delete"  class="delete-photo relative inline-flex items-center justify-center p-0.5  overflow-hidden text-sm font-medium text-gray-900 rounded-full group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
						  <span class="relative p-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-full group-hover:bg-opacity-0">
						      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
							<path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4" />
						</svg>
						  </span>
						</button>
						<div id="tooltip-delete" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
							   Delete Photo
							    <div class="tooltip-arrow" data-popper-arrow></div>
							</div>
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
				@if($photos->total() > 0)
				<div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">

					
				
					@foreach($photos as $photo)
					<div class="card drop-shadow-md photo-box photo-id-{{ $photo->id }}" data-theme="garden">
						<div class="center-cropped item-image item-image-loaded " style="background-image:url({{ getPhoto($photo->photo_name) }});">
							<div class="absolute mt-2 ml-2 checkbox_photo_select" >
								<input type="checkbox" data-theme="halloween" name="photo_select"  value="{{ $photo->id }}" class="checkbox" />
							</div>
							
						</div>
						
					</div>
					@endforeach
					
				</div>
				@else
					
						<p class="size text-sm text-gray-400 mt-16 text-center">No Photo Please add photo.</p>
					@endif
				
				
			</div>
		</div>
	</div>
</div>
<!-- Modal toggle --> 


<!-- Main modal -->

</x-app-layout>

<!-- Extra Large Modal -->
<div id="default-modal" data-modal-placement="top-center" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full h-full md:h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class=" sticky top-0 flex justify-between items-center p-5 bg-white rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Select Photos
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white close_modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form method="post" class="add_photo" action="/save-photo-album" >
            <div class="p-6 space-y-6">
               
			@csrf
			<input type="hidden" value="{{  $albums->id }}" name="albums_id">
			<div class="show-photo"></div>

            </div>
            <!-- Modal footer -->
            <div class=" sticky bottom-0  bg-white flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
            	<button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add Photo</button>

                <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 close_modal">Close</button>
            </div>
        </form>
        </div>
    </div>
</div>


{{-- <input type="checkbox" id="my-modal-3" class="modal-toggle" />
<div class="modal">
	
	<div class="modal-box w-full max-w-5xl">
		<div class="modal-header">
		<label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
		<h3 class="font-bold text-lg">Congratulations random Internet user!</h3>
	</div>
	<div class="modal-content">
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
</div> --}}


</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 @vite(['./node_modules/flowbite/dist/flowbite.js'])

<script type="text/javascript">
	$(document).ready(function() {
	// set the modal menu element
		const targetEl = document.getElementById('default-modal');
	// // options with default values
		const options = {
	// placement: 'bottom-right',
			backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
			onHide: () => {
				console.log('modal is hidden');
			},
			onShow: () => {
				console.log('modal is shown');
			},
			onToggle: () => {
				console.log('modal has been toggled');
			}
		};
		const modal = new Modal(targetEl, options);

	

		$('.loadPhoto').on('click', function(event) {
			event.preventDefault();

			$.get('/get-photo-user', function(data) {
				$('.show-photo').html(data)
				modal.show();

			});
		});


		$('.close_modal').on('click', function(event) {
			event.preventDefault();
			modal.hide();
		});

// set the element that trigger the tooltip using hover or click
const  tooltipDelete = document.getElementById('tooltip-delete');
const  tooltipDeleteBtn = document.getElementById('tooltip-delete-btn');

// options with default values
const optionsTool = {
  placement: 'top',
  triggerType: 'hover',
  onHide: () => {
      console.log('tooltip is shown');
  },
  onShow: () => {
      console.log('tooltip is hidden');
  }
};
const tooltip = new Tooltip(tooltipDelete,tooltipDeleteBtn, optionsTool);

		$('.photo-box').hover(function(){
			$('.checkbox_photo_select').show();

		},function(){
			var n = $( "input:checked" ).length;
			if (n == 0 ) {
				$('.checkbox_photo_select').hide();
				$('.div-delete-photo').hide('400');
				tooltip.hide();
			}else{
				$('.div-delete-photo').show('400');
				tooltip.show();
			}
		});

	$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$('.delete-photo').on('click',  function(event) {
			event.preventDefault();
			var photo = [];
			$.each($("input[name='photo_select']:checked"), function(){
	// photo.push($(this).val());
				var id = $(this).val();
				$.ajax({
					type: "get",
					url: '/image-delete/'+id ,
					success: function (result) {
						$('.photo-id-'+id ).remove()
					}
				});
			});
		});


	});




</script>