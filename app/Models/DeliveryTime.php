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
        $this->update([
            'delivery_from' => Carbon::parse($request->input('delivery_from')),
            'delivery_to' => Carbon::parse($request->input('delivery_to'))
        ]);
    }

}
