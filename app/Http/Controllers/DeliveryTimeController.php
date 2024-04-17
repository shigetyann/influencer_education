<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Curriculum;
use App\Models\DeliveryTime;
use App\Http\Requests\CurriculumRequest;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Validator;


class DeliveryTimeController extends Controller
{


    public function deliveryTimes ($id) {
        $curriculum = Curriculum::find($id);
        $curriculums = Curriculum::all();

        $delivery_times = DeliveryTime::where('curriculums_id', $id)->get();



        return view('delivery_times', [
            'curriculum' => $curriculum, 
            'curriculums' => $curriculums, 
            'delivery_times' => $delivery_times, 
            ]);

    }



    public function timesSet(Request $request, $id = null) {
        try {
            DB::beginTransaction();
    
            // 既存の授業の日時を削除
            DeliveryTime::where('curriculums_id', $id)->delete();
    
            // 新しい日時を登録
            $times = $request->input('times', []);
            logger('Times to insert:', $times); 
    
            $deliveryTimeModel = new DeliveryTime;
            $deliveryTimeModel->insertTimes($id, $times);
    
            DB::commit();
    
            logger('Delivery time updated.');
    
            $curriculum = Curriculum::find($id);
            return redirect()->route('curriculums_list', ['id' => $curriculum->grade_id])
                ->with('success', 'Curriculum updated successfully.');
        } catch (\Exception $e) {
            logger($e->getMessage());
            DB::rollback();
            return back()->withErrors(['error' => 'Failed to update delivery time.']);
        }
    }


}
