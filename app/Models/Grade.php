<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Grade extends Model
{
    use HasFactory;

    protected $table = 'grades';

    public function curriculum() {
        return $this->hasMany(Curriculum::class, 'grade_id', 'id');
        
    }

    public function getList() {
        $grades = DB::table('grades')->get();

        return $grades;
    }

}
