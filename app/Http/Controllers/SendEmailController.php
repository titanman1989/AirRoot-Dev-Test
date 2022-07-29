<?php

namespace App\Http\Controllers;
use App\Mail\SentEmail;
use Illuminate\Http\Request;
use Mail;


class SendEmailController extends Controller
{
    public function index()
    {
 
      // Mail::to('boopond@gmail.com')->send(new SentEmail());
        $orders = [
          'order_list' => 'order_list',
          'order_item' => 'order_item',
        ];

         $mail = [
          'email' => 'boopond@gmail.com',
          'name'  => "test Mail",
          'or_no' => 0005455555,

        ];
          Mail::send('email.notify-storage-mail', $orders, function($messages) use ($mail) {
             $messages->to($mail['email'], $mail['name'])->subject
                ('ยืนยันคำสั่งซื้อหมายเลข #'.$mail['or_no']);
                $messages->bcc('onlineaccount@oppothai.com');
             $messages->from('no-reply@onlineoppo.com','OPPO Thailand');
          });

 
    //   if (Mail::failures()) {
    //        return response()->Fail('Sorry! Please try again latter');
    //   }else{
    //        return response()->success('Great! Successfully send in your mail');
    //      }
    // } 
}
