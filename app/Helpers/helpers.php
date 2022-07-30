<?php
use Illuminate\Support\Str;


if (! function_exists('getProfilePicture')) {
  function getProfilePicture($name){
    $name_slice = explode(' ',$name);
    $name_slice = array_filter($name_slice);
    $initials = '';
    $initials .= (isset($name_slice[0][0]))?strtoupper($name_slice[0][0]):'';
    $initials .= (isset($name_slice[count($name_slice)-1][0]))?strtoupper($name_slice[count($name_slice)-1][0]):'';
    return '<div class="profile-pic">'.$initials.'</div>';
  }
}
  if (! function_exists('getMimeType')) {
    function getMimeType($num){
      switch ($num) {
        case 1:
        $mime = "image/gif";
        break;
        case 2:
        $mime = "image/jpg";
        break;
        case 3:
        $mime = "image/jpeg";
        break;
        case 4:
        $mime = "image/png";
        break;
        case 5:
        $mime = "image/svg+xml";
        break;
      
        default:
        $mime = '';
        break;
      }
      return $mime;
    }
  }
  if (! function_exists('getExtensionType')) {
    function getExtensionType($num){
      switch ($num) {
        case 1:
        $mime = "gif";
        break;
        case 2:
        $mime = "jpg";
        break;
        case 3:
        $mime = "jpeg";
        break;
        case 4:
        $mime = "png";
        break;
        case 5:
        $mime = "svg";
        break;
        
        default:
        $mime = '';
        break;
      }
      return $mime;
    }
  }



    if (! function_exists('getPhoto')) {
    function getPhoto($photo){
      if(Str::is('https://*', $photo)){
         $photo = $photo;
      }else{
        $photo = asset('photos/'.$photo);
      }
      return $photo;
    }
  }

