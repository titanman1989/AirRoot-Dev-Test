<style>
  .profile-pic{
    background: darkseagreen;
    color: #eeeeee;
/*    border-radius: 50%;*/
    height: 60px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 1.1rem;
    -webkit-box-shadow: 0 3px 5px rgb(54 60 241);
    box-shadow: 0 3px 5px rgb(54 60 241);
  }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Albums') }}
        </h2>
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


   <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                 


                        <div class="grid grid-cols-2 gap-2">
                            <div class=""><h3>Albums</h3> </div>
                            <div class=" text-right">
                        <label for="my-modal-3" class="btn modal-button btn-ghost">Create New Album</label>
                        </div>
                        </div>
                      
                             {{--  <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-5 lg:grid-cols-5 xl:grid-cols-5 gap-5">
                                @foreach($albums as $album)
                                    <div  class="flex justify-center  text-6xl  border-2 card glass">

                                   

                                                 <figure>{!! getProfilePicture($album->album_name) !!}</figure>
                                      
                                      <div class="card-body">
                                      <p class="card-title text-center"><a href="/albums/{{ $album->id }}">{{ $album->album_name }}</a></p>
                                  </div>
                                    </div>
                                        
                                      
                                @endforeach
                            </div>


                 
 --}}
           
                             <table class="table w-full">
                            <!-- head -->
                            <thead>
                              <tr>
                                
                                 <th>#</th>
                                <th>Album</th>
                                
                           
                                <th>Create at</th>
                                <th>Action</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                              <!-- row 1 -->
                               @foreach($albums as $key => $album)
                              <tr>
                                <td>{{ ($albums->currentPage()-1) * $albums->perPage() + $key + 1 }}</td>
                                <td>
                                  <p class="card-title text-center"><a href="/albums/{{ $album->id }}">{{ $album->album_name }}</a></p>
{{--                                  <td>{{ $photo->photo_extension }}</td> --}}
                              </td>
                               
                                <td>{{ $album->created_at }}</td>
                              <td>
                                <form action="{{ route('albums.destroy',$album->id) }}" method="POST">
                    
                                    <a class="btn btn-primary edit" data-id="{{ $album->id }}">Edit</a>
                    
                                    @csrf
                                    @method('DELETE')
                      
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                              </tr>
                              @endforeach
                            </tbody>
                         
                            
                          </table>
                           {!! $albums->appends(request()->query())->links() !!}
            </div>
        </div>
    </div> 
</div>
</x-app-layout>




<input type="checkbox" id="my-modal-3" class="modal-toggle" />
<div class="modal">
  <div class="modal-box relative">
    <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
    <h3 class="text-lg font-bold">Create an Album</h3>
    <form name="createnewalbum" method="POST" action="{{URL::route('albums.store')}}" enctype="multipart/form-data">
        @csrf
          <fieldset>
            <legend></legend>
            <div class="form-group">
            
              <label class="label">
                <span class="label-text">Album Name</span>
                 </label>
              <input type="text" name="name" placeholder="Album Name" class="input input-bordered w-full max-w-xs" />
            </div>
            
          
            <button type="submit" class="btn btn-default mt-6">Create!</button>
          </fieldset>
        </form>
  </div>
</div>


<input type="checkbox" id="my-modal-edit" class="modal-toggle" />
<div class="modal">
  <div class="modal-box relative">
    <label for="my-modal-edit" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
    <h3 class="text-lg font-bold">Edit an Album</h3>
    <div class="form-efit"></div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script type="text/javascript">
     $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
            
        // ajax
            $.get('/albums/'+id+'/edit', function(data) {
                 $('.form-efit').html(data)                                            
                document.getElementById('my-modal-edit').checked = true;
            });
     
    });
</script>

