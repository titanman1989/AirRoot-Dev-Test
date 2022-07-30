<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreignId('album_id')->constrained('album')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->integer('album_id')->nullable();
            $table->string('photo_name');
            $table->string('photo_extension');
            $table->string('photo_width');
            $table->string('photo_height');
            $table->string('photo_size');
            $table->string('photo_mime');
            $table->integer('photo_status');
            $table->softDeletes();
            $table->timestamps();
            // $table->foreign('user_id')->references('id')->on('users');
            
            // $table->foreign('album_id')->references('id')->on('album');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo');

    }
};
 // `photo_origin_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
 //  `photo_new_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
 //  `photo_temp_path` varchar(255) NOT NULL,
 //  `photo_extension` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
 //  `photo_status` enum('active','inactive') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
 //  `photo_date` datetime NOT NULL,


// create table `photo` (`id` bigint unsigned not null auto_increment primary key,
//                        `user_id` bigint unsigned not null,
//                        `album_id` bigint unsigned not null,
//                        `image_name` varchar(255) not null,
//                        `photo_temp_path` text not null,
//                        `photo_extension` text not null,
//                        `photo_width` text not null,
//                        `photo_height` text not null,
//                        `photo_size` text not null,
//                        `photo_mime` text not null,
//                        `photo_status` text not null,
//                        `deleted_at` timestamp null,
//                        `created_at` timestamp null,
//                        `updated_at` timestamp null) default character set utf8mb4 collate 'utf8mb4_unicode_ci'