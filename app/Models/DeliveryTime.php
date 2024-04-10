<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;


class DeliveryTime extends Model
{
    use HasFactory;

    protected $table = 'delivery_times';
    protected $fillable = [
        'delivery_from', 'delivery_to',
    ];

    protected $dates = [
        'delivery_from', 'delivery_to',
    ];

    public function curriculum() {
        return $this->belongsTo(Curriculum::class, 'curriculums_id', 'id');
    }

    public function getList() {

        return $this->all();
    }


    public function timesSet(Request $request) {
        $delivery_from_date = $request->input('delivery_from');
        $delivery_from_time = $request->input('delivery_from_time');
        $delivery_to_date = $request->input('delivery_to');
        $delivery_to_time = $request->input('delivery_to_time');
    
        $delivery_from = Carbon::createFromFormat('Y-m-d H:i', $delivery_from_date . ' ' . $delivery_from_time);
        $delivery_to = Carbon::createFromFormat('Y-m-d H:i', $delivery_to_date . ' ' . $delivery_to_time);
    
        $this->curriculums_id = $request->input('curriculums_id');
        $this->delivery_from = $delivery_from;
        $this->delivery_to = $delivery_to;
        $this->save();
    }
}
