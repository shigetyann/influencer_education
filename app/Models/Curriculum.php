<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Curriculum extends Model
{
    use HasFactory;

                 // カラムのホワイトリストの指定
        // モデルに関連付けるテーブル
        protected $table = 'curriculums';

        // テーブルに関連付ける主キー
        protected $primaryKey = 'id';

        // 登録・更新可能なカラムの指定
        protected $fillable = [
            'title',
            'thumbnail',
            'description',
            'video_url',
            'classes_id',
            'created_at',
            'updated_at'
        ];

    //ソートするカラムを記入
    //  public $sortable = ['product_name', 'company_id', 'price', 'stock'];
        /**
     * 一覧画面表示用にbooksテーブルから全てのデータを取得
     */
    public function findAllCurriculums()
    {
        return Curriculum::all();
    }

    public function InsertCurriculum($request)
    {
        // リクエストデータを基に管理マスターユーザーに登録する
        return $this->create([
            'title'            => $request->title,
            'thumbnail'        => $request->thumbnail,
            'description'       => $request->description,
            'video_url'        => $request->video_url,
            'classes_id'      => $request->classes_id,
            
            
            
        ]);
    }




    
    //ユーザー＿時間割　画面のルーティング
    public function getCurriculum() {
        // curriculumsテーブルからデータを取得
        $curriculums = DB::table('curriculums')
        ->join('delivery_times', 'curriculums.id', '=', 'curriculums_id')
        ->join('grades', 'curriculums.classes_id', '=', 'grades.id')
        ->get();
       

        return $curriculums;
    }


    // grades.id


    // // 詳細画面表示
    // public function getDetail($id) {
    //     //curriculums テーブルからデータを取得
    //     $curriculums = DB::table('curriculums')
    //         ->join('delivery_times', 'curriculums.id', '=', 'curriculums_id')
    //         ->select('curriculums.*', 'delivery_times.curriculums.id')
    //         ->where('curriculums.id', '=', $id)
    //         ->first();

    //     return $curriculums;
    // }

     //学年の機能
     public function getGrade($classes_id) {
        //  $curriculums = DB::table('curriculums')
        //  ->join('delivery_times', 'curriculums.id', '=', 'curriculums_id')
        // //  ->select('curriculums.*', 'curriculums.classes_id');
        //  ->select('grades', 'curriculums.classes_id', '=', 'name');
        
        // //  if($classes_id){
        // //  $curriculums->where('curriculums.classes_id', '=', $classes_id);
        // //  }
 
        //  if($classes_id){
        //  $curriculums->where('grades', 'curriculums.classes_id', '=', 'name');
        //  }
 
 
        //  $curriculums = $curriculums->get();
 
        //  return $curriculums;
         
            // 1021
            $curriculums = DB::table('curriculums')
                ->join('grades', 'curriculums.classes_id', '=', 'grades.id')
                ->where('curriculums.classes_id', $classes_id)
                ->select('curriculums.*', 'grades.name as grade_name')
                ->get();

            return $curriculums;
    }

    //  ↓ここで、classes_idをcurriculumsテーブル側の外部キーとして指定し、idをgradesテーブル側の主キーとして指定。

     public function grade()
    {
    return $this->belongsTo(Grade::class, 'classes_id', 'id');
    }

    
}

