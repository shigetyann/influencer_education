<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $curriculums = $model->getCurriculum();
         $delivery_times = $delivery_times->getCurriculum();
         $grades = $grades->getCurriculum();


        return view('curriculum', ['curriculums' => $curriculums],['delivery_times'=> $delivery_times],['grades'=> $grades]);
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
