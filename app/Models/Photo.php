<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
use Auth;
class Photo extends Model
{
    use HasFactory;
    use SoftDeletes;
    
  protected $table = 'photo';
  protected $fillable = [
    'id',
    'user_id',
    'album_id',
    'photo_name',
    'photo_extension',
    'photo_width',
    'photo_height',
    'photo_size',
    'photo_mime',
    'photo_status',
  ];
  public $timestamps =true;

  public static function getPhotoSize($id=''){
    $user = Auth::user(); 
    $photo = DB::table('photo');
        $photo->select('photo_mime',DB::raw('sum(photo_size) as size'));
        if ($id) {
        $photo->where('album_id',$id);
        }

        $photo->where('user_id',$user->id);
        $photo->whereNull('deleted_at');

        $photo->groupBy('photo_mime');
        return $photo->get();
    


}

  public static function getCheckStorage(){
    $user = Auth::user(); 
    $photo = DB::table('photo as p');
        $photo->leftJoin('users as u','p.user_id','u.id');
        $photo->select('u.name','u.email','u.id',DB::raw('sum(p.photo_size) as size'));
         $photo->whereNull('deleted_at');
        $photo->groupBy('user_id');
        $photo->havingRaw('sum(p.photo_size) >= ?', [90000000.00]);
        return $photo->get();
    


}


}










