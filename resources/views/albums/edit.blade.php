<form name="createnewalbum" method="POST" action="{{ route('albums.update',$albums->id )}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <fieldset>
            <legend></legend>
            <div class="form-group">
            
              <label class="label">
                <span class="label-text">Album Name</span>
                 </label>
              <input type="text" name="name" placeholder="Album Name" value="{{ $albums->album_name }}" class="input input-bordered w-full max-w-xs" />
            </div>
            
          
            <button type="submit" class="btn btn-default mt-6">Update!</button>
          </fieldset>
        </form>