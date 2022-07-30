<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PhotosTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     public function testIndex()

  { 

       $this->call('GET', 'posts');
 
    $this->assertViewHas('posts');
    
  }
 


  
}
