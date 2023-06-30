<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id'=>1,
            'category_id'=>1,
            'title' => 'ライブサイコーだった！',
            'body' => '〇〇のライブ最高だった！！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
         
        DB::table('posts')->insert([
            'user_id'=>2,
            'category_id'=>2,
            'title' => '〇〇のライブ一緒に行ってくれる人いませんか',
            'body' => '一緒に行ってくれる人チャットにて連絡待ってます。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id'=>3,
            'category_id'=>3,
            'title' => '〇〇のライブのセトリです。',
            'body' => '１、１２３　２、あいうえお　３，aiueo',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id'=>2,
            'category_id'=>1,
            'title' => '最近はこの曲にはまってます',
            'body' => 'みんなも聞いてください',
            'url'=>'https://www.youtube.com/watch?v=e9fhV2Ikoxg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id'=>1,
            'category_id'=>1,
            'title' => '新曲最高！！',
            'body' => '特にがサビがいいです…',
            'url'=>'https://www.youtube.com/watch?v=0HUaCT5IciQ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('posts')->insert([
            'user_id'=>3,
            'category_id'=>1,
            'title' => 'チケット外れた',
            'body' => '〇〇人気すぎてチケットの倍率高すぎ！！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
