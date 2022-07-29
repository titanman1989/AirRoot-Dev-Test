<?php 

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