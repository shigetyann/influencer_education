<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Grade extends Model
{
    public static function grades()
    {
        $grades = DB::table('grades')->get();
        return $grades;
    }

    public function classesClearCheckes()
    {
        return $this->hasMany(ClassClearCheck::class,'grades_id');
    }

    public function users()
    {
        return $this->hasMany(User::class,'grades_id');
    }

    public function curriculums()
    {
        return $this->hasMany(Curriculum::class,'grades_id');
    }

}
