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
    public function curriculum(Request $request, Curriculum $id) {

       $classes_id = $id;
    
         // インスタンス生成
         $model = new Curriculum();
         $delivery_times = new Delivery_time();
         $grades = new Grade();
        //  $curriculums = $model->getCurriculum($classes_id);
        $curriculums = $model->getCurriculum($id);
         $delivery_times = $delivery_times->getCurriculum();
         $grades = $grades->getCurriculum();
            //2024 1015
                $curriculums = Curriculum::with('grade')->get();
                return view('curriculum', ['curriculums' => $curriculums]);
                

        return view('curriculum', ['curriculums' => $curriculums,'delivery_times'=> $delivery_times,'grades'=> $grades]);
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

    $startOfMonth = $parsedMonth->startOfMonth();
    $endOfMonth = $parsedMonth->endOfMonth();

    

    // 該当月のスケジュールを取得
    $deliveryTimes = Delivery_Time::whereBetween('delivery_from', [$startOfMonth, $endOfMonth])
        ->orWhereBetween('delivery_to', [$startOfMonth, $endOfMonth])
        ->get();

    // ビューに渡す
    return view('curriculum', [
        'deliveryTimes' => $deliveryTimes,
        'currentMonth' => $currentMonth // ここで渡している
    ]);
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
