<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\User;
Use App\Models\Photo;
Use App\Models\Album;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
                    ->each(function ($album){
                        Photo::factory(50)
                        ->create(['album_id'=>$album->id])
                    })
                
            });
    }
}
