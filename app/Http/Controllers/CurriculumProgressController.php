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
        $curriculums = DB::table('curriculums')->get();
        $curriculumProgress = $user->curriculumProgress;
    
        $progressStatus = $curriculums->mapWithKeys(function ($curriculum) use ($curriculumProgress) {
            $isProgress = $curriculumProgress->where('curriculums_id', $curriculum->id)->first() ? true : false;
            return [$curriculum->id => $isProgress];
        });
    
        return view('user/curriculum_progress', compact('user', 'grades', 'curriculums', 'progressStatus'));
    }
    


}
