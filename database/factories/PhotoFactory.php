<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Photo;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        

         $rendom = $this->faker->numberBetween(1,6);
        return [
            
            'photo_extension' => getExtensionType($rendom),// $this->faker->fileExtension(),
            'photo_width' => $this->faker->numberBetween(0, 100),
            'photo_height' => $this->faker->numberBetween(0, 100),
            'photo_size' => $this->faker->numberBetween(1000,400000),
            'photo_mime' =>  getMimeType($rendom),//$this->faker->mimeType(),
            'photo_status' =>1,
            'photo_name' => "https://picsum.photos/id/".$this->faker->numberBetween(10,1000)."/200/300"
        ];
    }
}







