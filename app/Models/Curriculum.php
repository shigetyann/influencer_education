<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Curriculum extends Model
{
    use HasFactory;

    public function getCurriculums()
    {
        return DB::table('curriculums')->get();
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class,'grades_id');
    }

    public function curriculumProgress()
    {
        return $this->hasMany(CurriculumProgress::class,'curriculums_id');
    }
}
