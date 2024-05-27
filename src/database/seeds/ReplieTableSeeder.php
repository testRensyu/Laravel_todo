<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ReplieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,3) as $num){
            DB::table('replies')->insert([
                'board_id' => "{$num}",
                'name' => "【replies-seeder】テストスレッド {$num}",
                'title' => "【replies-seeder】テストタイトル {$num}",
                'message' => "【replies-seeder】Seederによる書き込み {$num}",
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