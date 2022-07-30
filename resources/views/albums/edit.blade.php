<form name="createnewalbum" method="POST" action="{{ route('albums.update',$albums->id )}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <fieldset>
            <legend></legend>
            
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Album Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Album 1" value="{{ $albums->album_name }} "required>
                    </div>
          
            <button type="submit"  class="relative inline-flex items-center justify-center p-0.5 mt-6 mb-2 mr-2 w-full overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 w-full bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
               Edit
            </span>
          </button>
          </fieldset>
        </form>