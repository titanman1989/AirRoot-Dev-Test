{{-- 
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script> --}}

    <style>
       .dropzone {
           
        }

        .min-h-screen {
            min-height: 90vh;
        }
    </style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-dashboard-card>
       
    {{-- <div id="dropzone" >
        <form action="{{ route('image.store') }}" class="dropzone" id="uploadFile" enctype="multipart/form-data">
            @csrf

            <div class="dz-message">
               Drag and Drop Single/Multiple Files Here<br>
            </div>
        </form>
    </div>
    <div id="template-preview">
        <div class="dz-preview dz-file-preview well" id="dz-preview-template">
                <div class="dz-details">
                        <div class="dz-filename"><span data-dz-name></span></div>
                        <div class="dz-size" data-dz-size></div>
                </div>
                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                <div class="dz-success-mark"><span></span></div>
                <div class="dz-error-mark"><span></span></div>
                <div class="dz-error-message"><span data-dz-errormessage></span></div>
        </div>
</div> --}}
  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
      <form action="{{ route('image.store') }}" class="dropzone" id="drop" data-theme="valentine">
      <div class="dz-message needsclick">
        Drop files here or click to upload
        </div>
      </form>
</div>
</div>
    </x-dashboard-card>

<x-dashboard-card>
  <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8">
    @if (session('status'))
    <div class="alert w-full alert-success">
        {{ session('status') }}
    </div>
@endif
</div>
</x-dashboard-card>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                 

                    <div class="overflow-x-auto w-full">
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
                          <table class="table w-full">
                            <!-- head -->
                            <thead>
                              <tr>
                                
                                 <th>#</th>
                                <th>Photo</th>
                                
                                <th>Mime</th>
                                <th>Size</th>
                                <th>Create at</th>
                                <th>Action</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                              <!-- row 1 -->
                               @foreach ($photos as $key => $photo)
                              <tr>
                                <td>{{ ($photos->currentPage()-1) * $photos->perPage() + $key + 1 }}</td>
                                <td>
                                  <div class="flex items-center space-x-3">
                                    <div class="avatar">
                                      <div class="mask mask-squircle w-20 h-20">
                                       <img src="{{ asset('photos/'.$photo->photo_name) }}" height="150" width="150" alt="" />
                                      </div>
                                    </div>
                                 
                                  </div>
                                </td>
{{--                                  <td>{{ $photo->photo_extension }}</td> --}}
                                <td>{{ $photo->photo_mime }}</td>
                                <td>
                                     
                                            <p class="tooltip" data-tip="{{ $photo->photo_size . ' bytes' }} / {{ round($photo->photo_size / 1000, 1) . ' KB' }} ">{{ round($photo->photo_size / (1000 * 1024), 2) . ' MB' }}</p>
                                </td>
                                <td>{{ $photo->created_at }}</td>
                              <td>
                                <form action="{{ route('image.destroy',$photo->id) }}" method="POST">
                    
{{--                                     <a class="btn btn-primary" href="{{ route('image.edit',$photo->id) }}">Edit</a> --}}
                   
                                    @csrf
                                    @method('DELETE')
                      
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                              </tr>
                              @endforeach
                            </tbody>
                         
                            
                          </table>
                           {!! $photos->appends(request()->query())->links() !!}
                        </div>

                </div>
            </div>
        </div>
    </div> 
</x-app-layout>


