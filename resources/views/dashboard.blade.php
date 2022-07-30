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
{{ __('Photos') }}
</h2>
</x-slot>
<x-dashboard-card>

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
<div class="py-1">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                
                
                <div class=" relative">
                    <div class="flex justify-between items-center pb-4 bg-white dark:bg-gray-900">
                     
                </div>
                @php
                $sizeToal = 0;
                @endphp
                @if($mime)<a href="/image" class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-md font-bold mr-2 px-2.5 py-1 rounded dark:bg-blue-200 dark:text-blue-800 dark:hover:bg-blue-300">All</a>@endif
                @foreach ($size as $key => $size_)
                
                <a href="/image?mi={{ $size_->photo_mime }}" class=" {{ $size_->photo_mime==$mime?"border border-red-700  shadow-lg shadow-red-500/50":'' }} bg-blue-100 hover:bg-blue-200 text-blue-800 text-md font-bold mr-2 px-2.5 py-1 rounded dark:bg-blue-200 dark:text-blue-800 dark:hover:bg-blue-300">{{ $size_->photo_mime }} = {{ round($size_->size / (1000 * 1024), 2) . ' MB'  }}</a>
                {{--                             <span class="bg-green-100 text-green-800 text-xl font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900"></span> --}}
                @php
                $sizeToal  +=$size_->size;
                @endphp
                @endforeach
                <span class="float-right">Total : {{ round($sizeToal / (1000 * 1024), 2) . ' MB'  }}</span>
                <table class="w-full text-sm text-left mt-2 text-gray-500 dark:text-gray-400 mb-6 shadow-md  md:rounded-lg sm:rounded-lg">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            {{--     <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th> --}}
                            <th scope="col" class="p-4">#</th>
                            <th scope="col" class="py-1 px-3">Photo</th>
                            <th scope="col" class="py-1 px-3">Album</th>
                            <th scope="col" class="py-3 px-6">Mime</th>
                            <th scope="col" class="py-3 px-6">Size</th>
                            <th scope="col" class="py-3 px-6">Create at</th>
                            <th scope="col" class="py-3 px-6">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($photos as $key => $photo)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            {{--  <td class="p-4 w-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td> --}}
                            <td class="p-4 w-4">
                                {{ ($photos->currentPage()-1) * $photos->perPage() + $key + 1 }}
                            </td>
                            <td scope="row" class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="photos-cropped item-image item-image-loaded  rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 " style="background-image:url({{ getPhoto($photo->photo_name) }});">
                                    <img class="opacity-0 "  src="{{getPhoto($photo->photo_name) }}" alt="{{ $photo->photo_name }}">
                                </div>
                            </td>
                            <td>
                                <div class="pl-3">
                                    {{ $photo->album_name }}
                                </div>
                            </td>
                            <td>
                                <div class="pl-3">
                                    {{ $photo->photo_mime }}
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <p class="tooltip" data-tip="{{ $photo->photo_size . ' bytes' }} / {{ round($photo->photo_size / 1000, 1) . ' KB' }} ">{{ round($photo->photo_size / (1000 * 1024), 2) . ' MB' }}</p>
                            </td>
                            <td class="py-4 px-6">
                                {{ $photo->created_at }}
                            </td>
                            <td class="py-4 px-6">
                                <form action="{{ route('image.destroy',$photo->id) }}" method="POST">
                                    
                                    {{--                                     <a class="btn btn-primary" href="{{ route('image.edit',$photo->id) }}">Edit</a> --}}
                                    
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                        Delete
                                    </span>
                                    </button>
                                    
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- <script src="http://127.0.0.1:5174/./node_modules/flowbite/dist/flowbite.js"></script> --}}
 @vite(['./node_modules/flowbite/dist/flowbite.js'])