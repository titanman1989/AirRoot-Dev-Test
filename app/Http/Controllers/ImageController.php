<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Photo;
use Image;
use Auth;
use Redirect;

class ImageController extends Controller
{   
          public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd(phpinfo());
        // $getCheckStorage = Photo::getCheckStorage();
        $mime   = $request->input('mi');
        $user   = Auth::user(); 
        $photos = Photo::leftJoin('album as a','photo.album_id','a.id');
        $photos->select('photo.*','a.album_name');
        $photos->where('photo.user_id',$user->id);
        if ($mime) {
            $photos->where('photo.photo_mime',$mime);
        }
        $photos->orderBy('photo.id','desc');
        $photos = $photos->paginate(5);
        $size   = Photo::getPhotoSize();
        
        return view('dashboard',compact('photos','size','mime'));
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $user            = Auth::user(); 
        // $image = $request->file('file');
        // $imageName = time().'.'.$image->extension(); 
        // $image->move(public_path('images'),$imageName);  
        // return response()->json(['success'=>$imageName]);
        // $gName = explode('@', );
        $gName = Str::of($user->email)->explode('@');
        $gNameReDot = Str::replace('.', '-', $gName[0]);


        try {
      if ($request->file('file')->isValid()) {
        $image = $request->file('file');

        $imgFile  = Image::make($image->getRealPath());
        $extension = $image->getClientOriginalExtension();
        $clientOriginalName = $image->getClientOriginalName();
        $photo_name = $gNameReDot.'-'.md5(microtime()).'.'.$extension;
        $width = $imgFile->width();
        $height = $imgFile->height();
        $mime = $imgFile->mime();
        $size = $imgFile->filesize();
        // Save File to local drive
        Storage::putFileAs('photos',$image , $photo_name);
// dd($photo);
        //Save File to Photo table
        $photo = new Photo();
        $photo->user_id = $user->id;
        $photo->photo_name = $photo_name;
        $photo->photo_extension = $extension;
        $photo->photo_width = $width;
        $photo->photo_height = $height;
        $photo->photo_size = $size;
        $photo->photo_mime = $mime;
        $photo->photo_status = 1;
        // $photo->photo_date = Carbon::now();
        $photo->save();



        return response()->json([
          // 'path' => $path,
          'extension' => $extension,
          'clientOriginalName' => $clientOriginalName,
          'newFileName' => $photo_name
        ]);
      }
    } catch (\Throwable $th) {
      return $th->getMessage();
    }

      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       
             Photo::destroy($id);
       
         return Redirect::route('image.index')->with('status', 'Delete successfully');;
        // $photo = Photo::find($id);
    }
public function imageDelete($id)
    {

       
             Photo::destroy($id);
       
         return response()->json(['success' => true]);
        // $photo = Photo::find($id);
    }

  
}
