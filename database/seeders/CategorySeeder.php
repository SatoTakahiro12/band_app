<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id'=>'1',
            'name'=>'語ります！',
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
            ]);
        
         DB::table('categories')->insert([
             'id'=>'2',
            'name'=>'ライブ同行者募集！',
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
            ]);
            
         DB::table('categories')->insert([
            'id'=>'3',
            'name'=>'セトリ',
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
            ]);
    }
}
