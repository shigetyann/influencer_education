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
        return view('user/curriculum_progress', compact('user','grades','curriculums'));
    }

    public function progress($id)
    {
        $user = Auth::user();
        $curriculumProgress = $user->curriculum_progress;

        app(ClassClearCheckController::class)->updateClearStatus(request(), $id, $curriculumProgress);

        $isProgress = $curriculumProgress->where('curriculum_id', $id)->first();

        return view('user/curriculum_progress', ['isProgress' => $isProgress]);
    }


}
