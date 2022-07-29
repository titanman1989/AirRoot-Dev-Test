<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class Album extends Model
{
    
     use HasFactory;
    use SoftDeletes;
    
  protected $table = 'album';
  protected $fillable = [
    'id',
    'user_id',
    'album_name',
    'status'
  
  ];
  public $timestamps =true;


    public static function getAlbum($id){

    $myAlbum = DB::table('album')
        ->where('user_id',$id)
        ->whereNull('deleted_at');

        return $myAlbum->paginate(10);
    


}

 public static function getAlbumUser($id){

    $myAlbum = DB::table('album as a')
        ->leftJoin('photo as p','p.album_id','a.id')
        ->where('a.id',$id)
        ->whereNull('p.deleted_at');
        return $myAlbum->paginate(25);
    


}

}
