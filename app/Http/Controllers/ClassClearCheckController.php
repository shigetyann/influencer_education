<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClassClearCheckController extends Controller
{
    public function updateClearStatus(Request $request, $id, $curriculumProgress)
    {
        $classClearCheck = ClassClearCheck::find($id);
        
        if ($curriculumProgress == 1 && $classClearCheck->clear_flg == 0) {
            $classClearCheck->clear_flg = 1;
            $classClearCheck->save();
        }
        
        return redirect()->route('curriculum_progress');
    }

}
