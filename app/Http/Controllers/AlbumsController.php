<?php

namespace App\Http\Controllers;
use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use View;
use Auth;
use DB;
class AlbumsController extends Controller
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
            $user            = Auth::user(); 

        $data['albums'] = Album::getAlbum($user->id);
    return view('albums.index',$data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  //   public function getAlbum($id)
  // {
  //   $album = Album::with('Photos')->find($id);
  //   return View::make('album')->with('album',$album);
  // }

    public function create()
    {
        return View::make('createalbum');
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

    // $file = Input::file('cover_image');
    // $random_name = str_random(8);
    // $destinationPath = 'albums/';
    // $extension = $file->getClientOriginalExtension();
    // $filename=$random_name.'_cover.'.$extension;
    // $uploadSuccess = Input::file('cover_image')
    // ->move($destinationPath, $filename);
    $album = Album::create(array(
      'album_name' => $request->input('name'),
      'user_id'    =>$user->id,
      'status'     => 1
      // 'description' => Input::get('description'),
      // 'cover_image' => $filename,
    ));

    return redirect()->action([AlbumsController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {    
         $albums = Album::find($id);
         $photos = Album::getAlbumUser($id);
         $size  = Photo::getPhotoSize($id);
            return view('albums.show',compact('albums','photos','size')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $albums = Album::find($id);
        return view('albums.edit',compact('albums'));
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
         $albums_name = $request->input('name');
        $Album = Album::find($id);
 
        $Album->album_name = $albums_name;
         
        $Album->save();

        return Redirect::route('albums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //     $album = Album::find($id);

    // $album->delete();
      Album::destroy($id);

    return Redirect::route('albums.index');
    }


    public function getPhoto(){
            $user            = Auth::user(); 
          $photo = DB::table('photo')
            ->where('user_id',$user->id)
            ->whereNull('album_id');
        $data['photos']  =  $photo->get();

    return view('albums.show-photo',$data);
        // return $photo->get();
    }

    public function savePhotoAlbum(Request $request)
    {   

        $albums_id = $request->input('albums_id');

        $photo_select = $request->input('photo_select');
       // dd($request->all(), $albums_id,$photo_select);
        
        foreach ($photo_select as $val) {
             $Photo = Photo::find($val);
            $Photo->album_id = $albums_id;
            $Photo->save();

        }

       // dd('/albums/'.$album_id , $album_id,$photo_select);
       // return redirect('/albums/'.$album_id);
        return redirect()->route('albums.show',['album' => $albums_id]);


    }
}
