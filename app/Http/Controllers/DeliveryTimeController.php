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

        $delivery_time = DeliveryTime::where('curriculums_id', $id)->first();

        if (!$delivery_time) {
            $delivery_time = new DeliveryTime;
            $delivery_time->curriculums_id = $id; 
        }

        $delivery_times = DeliveryTime::all();

        return view('delivery_times', ['curriculum' => $curriculum, 'curriculums' => $curriculums, 'delivery_times' => $delivery_times, 'delivery_time' => $delivery_time]);

    }



    public function timesSet(Request $request, $id = null) {
        try {
            DB::beginTransaction();
    
            $validator = Validator::make($request->all(), [
                'delivery_from' => 'required|date_format:Y-m-d',
                'delivery_from_time' => 'required|date_format:H:i',
                'delivery_to' => 'required|date_format:Y-m-d',
                'delivery_to_time' => 'required|date_format:H:i',
            ]);
    
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->first()], 400);
            }
    
            $delivery_time = $id ? DeliveryTime::find($id) : new DeliveryTime();
    
            if (!$delivery_time) {
                return response()->json(['error' => 'Delivery time not found'], 404);
            }
    
            $delivery_time->setTimes($request);
    
            DB::commit();
    
            logger('Delivery time updated.');
    
            $curriculum = $delivery_time->curriculum;
    
            return redirect()->route('curriculums_list', ['id' => $curriculum->grade_id])
                ->with('success', 'Curriculum updated successfully.');
        } catch (\Exception $e) {
            logger($e->getMessage());
            DB::rollback();
            return back()->withErrors(['error' => 'Failed to update delivery time.']);
        }
    }    


}
