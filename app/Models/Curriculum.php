<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; 

class Curriculum extends Model
{
    use HasFactory;
    protected $table = 'curriculums';

    protected $fillable = [
        'title', 'thumbnail', 'description', 'video_url', 'alway_delivery_flg', 'grade_id',
    ];


    public function grade() {
        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }

    public function deliveryTime() {
        return $this->hasMany(DeliveryTime::class, 'curriculums_id', 'id');
    }


    public function getList() {

        return $this->all();
    }

    public function updateCurriculum(Request $request) {
        $thumbnail = $this->updateThumbnail($request);
    
        $this->update([
            'title' => $request->input('title'),
            'thumbnail' => $thumbnail,
            'description' => $request->input('description'),
            'video_url' => $request->input('video_url'),
            'alway_delivery_flg' => $request->input('alway_delivery_flg', 0) === 'ON' ? 1 : 0,
            'grade_id' => $request->input('grade_id'),
        ]);
    }
    
    private function updateThumbnail(Request $request) {
        if ($request->hasFile('thumbnail')) {
            $filename = $request->file('thumbnail')->store('public');
            return basename($filename);
        }
        return $this->thumbnail;
    }
}
