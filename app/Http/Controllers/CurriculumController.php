<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Curriculum;
use App\Models\Delivery_time;
use App\Models\Grade;

use Illuminate\Support\Facades\DB;


class CurriculumController extends Controller
{
    public function curriculum(Request $request, Curriculum $id ) {
            // 2024 1015 学年情報の取得
            // $grade = Grade::find($id);
            $grade = Grade::where('id', $id)->first();
            
       
       $classes_id = $id->id; //ここでIDを取り出す
    
         // インスタンス生成
         $model = new Curriculum();
         $delivery_times = new Delivery_time();
         $grades = new Grade();
        //  $curriculums = $model->getCurriculum($classes_id);
        $curriculums = $model->getCurriculum($classes_id);
         $delivery_times = $delivery_times->getCurriculum();
            
        $grades = $grades->getCurriculum();
            

            //2024 1015
                // $curriculums = Curriculum::with('grade')->get();
            // 1021　カリキュラムの情報を取得
                $curriculums = Curriculum::where('classes_id', $id)->get();
                    
                
        $currentMonth =  now()->format('Y-m');

                
                        

        return view('curriculum', ['curriculums' => $curriculums,'delivery_times'=> $delivery_times,
        'grades'=> $grades, 'grade'=> $grade, 'currentMonth' => $currentMonth]);
    }


    // 20241015②
public function showSchedule(Request $request)
{
    
    $currentMonth = $request->input('month', now()->format('Y-m')); // リクエストから'month'を取得、なければ現在の月
    
    $parsedMonth = null;

    try{
        $parsedMonth = Carbon::parse($currentMonth);
    } catch (\Exception $e) {
        // 例外が発生した場合は現在の月を使用する
        $parsedMonth = now();
    }

    $startOfMonth = Carbon::parse($parsedMonth)->startOfMonth();
    $endOfMonth = Carbon::parse($parsedMonth)->endOfMonth();
    

    

    // 該当月のスケジュールを取得
    $delivery_times = Delivery_Time::whereBetween('delivery_from', [$startOfMonth, $endOfMonth])
        ->orWhereBetween('delivery_to', [$startOfMonth, $endOfMonth])
        ->get();

    // 該当月のカリキュラムを取得
    $curriculums = Curriculum::where('id', $currentMonth)->get();

       

    // ビューに渡す
    return view('curriculum', [
        'delivery_times' => $delivery_times,
        'curriculums' => $curriculums,
        'currentMonth' => $currentMonth // ここで渡している
    ]);
}


//学年画面
public function showGrade($classes_id,$id){
     dd($id);   
    $model = new Curriculum();
    $curriculums = $model->getGrade($classes_id);
    // $curriculums = Curriculum::with('grade')->where('classes_id',$classes_id)->get();
        
    $grades = new Grade();
    $grades = $grades->getCurriculum();
        // 学年情報を取得
        $grade = Grade::find($id); //ここで単一の学年モデルを取得
        // 1021　該当する学年IDでカリキュラムを絞り込む
        $curriculums = Curriculum::where('classes_id', $id)->get(); //該当するカリキュラムを取得


   
   
    return view ('curriculum',['curriculums' => $curriculums, 
                'grades' =>$grades,
                'grade' =>$grade  //ビューに学年情報を渡す
    ]);


   
}

// 学年IDと年月
public function showCurriculum($gradeId, $yearMonth)
{
    // 年月を分割して年と月を取得
    $year = substr($yearMonth, 0, 4);
    $month = substr($yearMonth, 4, 2);

    

    // 学年情報を取得
    $grade = Grade::find($gradeId);
    

    // 授業情報を該当の学年IDと年月で絞り込む
    $curriculums = Curriculum::where('classes_id', $gradeId)
                              ->whereYear('delivery_from', $year)
                              ->whereMonth('delivery_from', $month)
                              ->get();

    return view('curriculum', compact('grade', 'curriculums', 'year', 'month'));
}



                           





   
    // //学年詳細画面
    // public function showDetail($id){
        
    //     $model = new Curriculum();
    //     $curriculums = $model->getDetail($id);
    //     $delivery_times = new Delivery_time();
    //     $delivery_times = $delivery_times->getCurriculum();
       
    //     return view ('detail',['curriculums' => $curriculums],['delivery_times'=> $delivery_times]);
    // }

     
}
