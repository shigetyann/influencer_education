<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Curriculum;
use App\Models\DeliveryTime;


class DeliveryTimeController extends Controller
{


    public function deliveryTimes ($id) {
        $curriculum = Curriculum::find($id);
        $curriculums = Curriculum::all();

        $delivery_time = DeliveryTime::where('curriculums_id', $id)->first();
        $delivery_times = DeliveryTime::all();

        return view('delivery_times', ['curriculum' => $curriculum, 'curriculums' => $curriculums, 'delivery_times' => $delivery_times, 'delivery_time' => $delivery_time]);

    }



    public function timesSet(Request $request, $id) {
        DB::beginTransaction();

        try {
            $delivery_time = DeliveryTime::findOrFail($id);
            $delivery_time->timesSet($request);
    
            DB::commit();
    
            logger('配信日時が編集されました。');
    
        } catch (\Exception $e) {
            logger($e->getMessage());
            DB::rollback();
            return back()->withErrors(['error' => 'Failed to update delivery_time.']);
        }

        $curriculum = $delivery_time->curriculum;
    
        return redirect(route('curriculums_list', ['id' => $curriculum->grade_id]))
        ->with('success', 'Curriculum updated successfully.')
        ->with(compact('delivery_time', 'curriculum'));

    }
}
