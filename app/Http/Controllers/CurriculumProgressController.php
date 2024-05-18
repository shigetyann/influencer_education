<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurriculumProgressController extends Controller
{
    public function curriculumProgress(){
        $user = Auth::user();
        $grades = DB::table('grades')->get();
        
        // 学年ごとのカリキュラムをグループ化
        $curriculumsByGrade = DB::table('curriculums')->get()->groupBy('grades_id');
        $curriculumProgress = $user->curriculumProgress;
    
        // 各カリキュラムの進捗状況を取得
        $progressStatus = $curriculumProgress->pluck('curriculums_id')->toArray();
    
        return view('user/curriculum_progress', compact('user', 'grades', 'curriculumsByGrade', 'progressStatus'));
    }
}
