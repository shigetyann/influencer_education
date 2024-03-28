<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CurriculumRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Curriculum;
use App\Models\Grade;
use App\Models\DeliveryTime;


class CurriculumController extends Controller
{
    public function curriculumsList ($grade_id) {
        $curriculums = Curriculum::where('grade_id', $grade_id)->get();
        $grade = Grade::find($grade_id);
        $grades = Grade::all();
        $delivery_times = [];

        foreach ($curriculums as $curriculum) {
            $delivery_times[$curriculum->id] = $curriculum->deliveryTime->map(function ($item) {
                return [
                    'delivery_from' => \Carbon\Carbon::parse($item->delivery_from),
                    'delivery_to' => \Carbon\Carbon::parse($item->delivery_to),
                ];
            });

        }

        return view('curriculums_list', ['curriculums' => $curriculums, 'grade' => $grade, 'grades' => $grades, 'delivery_times' => $delivery_times]);

    }

    public function curriculumsSetting ($id) {
        $curriculum = Curriculum::find($id);

        $curriculumModel = new Curriculum();
        $curriculums = $curriculumModel->getList();

        $gradeModel = new Grade();
        $grades = $gradeModel->getList();

        $delivery_timeModel = new DeliveryTime();
        $delivery_times = $delivery_timeModel->getList();


        return view('curriculums_setting', ['curriculums' => $curriculums, 'grades' => $grades, 'delivery_times' => $delivery_times, 'curriculum' => $curriculum]);

    }

    public function curriculumsEdit(Request $request, $id) {
        DB::beginTransaction();
    
        try {
            $curriculum = Curriculum::findOrFail($id);
            $curriculum->updateCurriculum($request);
    
            DB::commit();
    
            logger('授業内容が編集されました。');
    
        } catch (\Exception $e) {
            logger($e->getMessage());
            DB::rollback();
            return back()->withErrors(['error' => 'Failed to update curriculum.']);
        }
    
        return redirect(route('curriculums_list', ['id' => $curriculum->grade_id]))->with('success', 'Curriculum updated successfully.');
    }
}
