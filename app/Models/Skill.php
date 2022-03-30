<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Skill extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function name()
    {
        if(App::getLocale() == "ar")
        {
            return json_decode($this->name)->ar;
        }
    }

    public function getStudentsCount()
    {
        $studentNum = 0;
        foreach($this->exams as $exam)
        {
                $studentNum+= $exam->users()->count();
        }

        return $studentNum;
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
