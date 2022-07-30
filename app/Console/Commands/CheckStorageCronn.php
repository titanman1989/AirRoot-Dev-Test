<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Photo;
use App\Mail\MailCheckStorage;
use Mail;

class CheckStorageCronn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checkstorage:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
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
      return 0;
    }


}



