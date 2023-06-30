<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'image_url'=>'audience-g11518fcc3_640.jpg',
            'fav_band'=>'〇〇',
            'fav_song'=>'〇〇',
            'user_id'=>1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('profiles')->insert([
            'image_url'=>'guitar-g8b133a7eb_640',
            'fav_band'=>'××',
            'fav_song'=>'××',
            'user_id'=>2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('profiles')->insert([
            'image_url'=>'musician-g4f7faa85a_640',
            'fav_band'=>'〇×',
            'fav_song'=>'〇×',
            'user_id'=>3,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
