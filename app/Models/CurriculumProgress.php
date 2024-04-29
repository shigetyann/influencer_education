<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class CurriculumProgress extends Model
{
    use HasFactory;

    public static function curriculumProgress(){
        $curriculumProgress = DB::table('curriculumProgress')->get();
        return $curriculumProgress;
    }

    public function curriculum()
    {
        return $this->belongsTo(curriculum::class,'curriculums_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }
}
