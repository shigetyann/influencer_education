<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ClassClearCheck extends Model
{
    public static function classClearCheck()
    {
        $classes_clear_checks = DB::table();
        return $classes_clear_checks;
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class,'grades_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }
}
