<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Delivery_time extends Model
{
    use HasFactory;
    protected $table = 'delivery_times';

    protected $fillable =
    [
        'id', 
        'curriculums_id',
        'delivery_from',
        'delivery_to',   
    ];
    //ユーザー＿時間割　画面のルーティング
    public function getCurriculum(){
        // curriculumsテーブルからデータを取得
        $delivery_times= DB::table('delivery_times')->get();

        return $delivery_times;
    }




    



    // use HasFactory;
    // //ユーザー＿時間割　画面のルーティング
    // public function getCurriculum() {
    //     // curriculumsテーブルからデータを取得
    //     $delivery_times = DB::table('delivery_times')->get();

    //     return $delivery_times;
    // }

}
