<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Grade extends Model
{
    use HasFactory;

    protected $table = 'grades';

    protected $fillable =
    [
        'id', 
        'name'
        


    ];
    //ユーザー＿時間割　画面のルーティング
    public function getCurriculum(){
        // curriculumsテーブルからデータを取得
        $grades= DB::table('grades')->get();

        return $grades;
    }

}
