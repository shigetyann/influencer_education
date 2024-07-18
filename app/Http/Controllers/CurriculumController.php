<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculum;
use App\Models\Delivery_time;
use Illuminate\Support\Facades\DB;

class CurriculumController extends Controller
{
    public function curriculum() {
         // インスタンス生成
         $model = new Curriculum();
         $delivery_times = new Delivery_time();
         $curriculums = $model->getCurriculum();
         $delivery_times = $delivery_times->getCurriculum();

        return view('curriculum', ['curriculums' => $curriculums],['delivery_times'=> $delivery_times]);
    }
}
