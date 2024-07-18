<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Curriculum extends Model
{
    use HasFactory;
    //ユーザー＿時間割　画面のルーティング
    public function getCurriculum() {
        // curriculumsテーブルからデータを取得
        $curriculums = DB::table('curriculums')
        ->join('delivery_times', 'delivery_times.delivery_from', 'delivery_times.delivery_to')
       
         ->get();

        return $curriculums;
    }



    
}

