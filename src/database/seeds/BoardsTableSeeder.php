<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BoardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,3) as $num){
            DB::table('boards')->insert([
                'name' => "テストスレッド {$num}",
                'title' => "テストタイトル {$num}",
                'message' => "Seederによる書き込み{$num}",
                'email' => "test{$num}@seeder.com",
                'website' =>"https://www.yahoo.co.jp/",
                'text_color' => "#a52a2a",
                'delete_key' => "1234",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                
            ]);
        }
    }
}
