<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Photo;
use App\Models\Album;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
       

         User::factory(3)
            ->create()
            ->each(function ($user){
                Album::factory(5)
                    ->create(['user_id'=>$user->id])
                    ->each(function ($album) use (&$user){
                        Photo::factory(10)
                        ->create([
                                  'album_id'=>$album->id,
                                  'user_id'=>$user->id,

                              ]);
                    });
                
            });
    }
}
