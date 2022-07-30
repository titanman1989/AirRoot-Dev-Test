<?php

namespace App\Http\Controllers;
use App\Mail\SentEmail;
use Illuminate\Http\Request;
use Mail;
use App\Models\Photo;
use App\Mail\MailCheckStorage;

class SendEmailController extends Controller
{
    public function index()
    {
 
    $checkStorage = Photo::getCheckStorage();
         // info("Cron Job running at ". now());
        if ($checkStorage) {
            
            foreach ($checkStorage as $val) {
                 $email = $val->email;
   
                        $maildata = [
                            'name'=> $val->name,
                            'size' => $val->size,
                            'url' => url()->full()
                        ];
                  
                        Mail::to($email)->send(new MailCheckStorage($maildata));

            }
       
      }
    //   if (Mail::failures()) {
    //        return response()->Fail('Sorry! Please try again latter');
    //   }else{
    //        return response()->success('Great! Successfully send in your mail');
    //      }
    // } 
}
}