<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurriculumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('curriculums')->insert([
        [
            'id'=>'1',
            'title'=>'授業タイトル1',
            'thumbnail'=>'2024年5月',
            'description'=>'がんばろう',
            'video_url'=>'エンジニアになれるまで後少し',
            'always_delivery_flg'=>'1',
            'grades_id'=>'1',
        ],
        [
            'id'=>'2',
            'title'=>'授業タイトル2',
            'thumbnail'=>'2024年5月',
            'description'=>'がんばろう',
            'video_url'=>'エンジニアになれるまで後少し',
            'always_delivery_flg'=>'0',
            'grades_id'=>'1',
        ],
        [
            'id'=>'3',
            'title'=>'授業タイトル3',
            'thumbnail'=>'2024年5月',
            'description'=>'がんばろう',
            'video_url'=>'エンジニアになれるまで後少し',
            'always_delivery_flg'=>'0',
            'grades_id'=>'1',
        ],
        [
            'id'=>'4',
            'title'=>'授業タイトル4',
            'thumbnail'=>'2024年5月',
            'description'=>'がんばろう',
            'video_url'=>'エンジニアになれるまで後少し',
            'always_delivery_flg'=>'0',
            'grades_id'=>'1',
        ],
        [
            'id'=>'5',
            'title'=>'授業タイトル5',
            'thumbnail'=>'2024年5月',
            'description'=>'がんばろう',
            'video_url'=>'エンジニアになれるまで後少し',
            'always_delivery_flg'=>'0',
            'grades_id'=>'1',
        ],
            ]);
    }
}
