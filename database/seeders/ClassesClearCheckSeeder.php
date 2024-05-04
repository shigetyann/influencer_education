<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassesClearCheckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('classes_clear_checks')->insert([
            [
                'id'=>'1',
                'user_id'=>'1',
                'grades_id'=>'1',
                'clear_flg'=>'1',
            ],
            [
                'id'=>'2',
                'user_id'=>'1',
                'grades_id'=>'1',
                'clear_flg'=>'0',
            ],
            [
                'id'=>'3',
                'user_id'=>'1',
                'grades_id'=>'1',
                'clear_flg'=>'1',
            ],
            [
                'id'=>'4',
                'user_id'=>'1',
                'grades_id'=>'1',
                'clear_flg'=>'1',
            ],
            [
                'id'=>'5',
                'user_id'=>'1',
                'grades_id'=>'1',
                'clear_flg'=>'0',
            ],
        ]);
    }
}
