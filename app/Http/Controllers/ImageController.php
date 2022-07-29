<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
    public function index()
    {
        // dd(phpinfo());
                 $user            = Auth::user(); 
            $photos = Photo::where('user_id',$user->id)->orderBy('id','desc')->paginate(5);
            $size  = Photo::getPhotoSize();
        
         return view('dashboard',compact('photos','size'));
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

        try {
      if ($request->file('file')->isValid()) {
        $image = $request->file('file');


        $imgFile  = Image::make($image->getRealPath());
        $extension = $image->getClientOriginalExtension();
        $clientOriginalName = $image->getClientOriginalName();
        $photo_name = time() . $clientOriginalName;
        $width = $imgFile->width();
        $height = $imgFile->height();
        $mime = $imgFile->mime();
        $size = $imgFile->filesize();
        // Save File to local drive
        Storage::putFileAs('photos',$image , $photo_name);

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


    // 'user_id',
    // 'album_id',
    // 'photo_name',

    // 'photo_extension',
    // 'photo_width',
    // 'photo_height',
    // 'photo_size',
    // 'photo_mime',
    // 'photo_status',


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

        // $this->validate($request, [
        //     'file' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        // ]);
        // $image = $request->file('file');
        // $input['file'] = time().'.'.$image->getClientOriginalExtension();
        
        // $destinationPath = public_path('/thumbnail');
        // $imgFile = Image::make($image->getRealPath());
        // $imgFile->resize(300, null, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save($destinationPath.'/'.$input['file']);


        // $destinationPath = public_path('/uploads');
        // $image->move($destinationPath, $input['file']);
        // return back()
        //     ->with('success','Image has successfully uploaded.')
        //     ->with('fileName',$input['file']);
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

    public function resizeImage(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        $image = $request->file('file');
        $input['file'] = time().'.'.$image->getClientOriginalExtension();
        
        $destinationPath = public_path('/thumbnail');
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize(150, 150, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['file']);
        $destinationPath = public_path('/uploads');
        $image->move($destinationPath, $input['file']);
        return back()
            ->with('success','Image has successfully uploaded.')
            ->with('fileName',$input['file']);
    }
}
