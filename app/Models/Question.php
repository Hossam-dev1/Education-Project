<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Question extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function questionTitle()
    {
        if(App::getLocale() == "ar")
        {
            return json_decode($this->title)->ar;
        }
    }
    
    public function questionOption1()
    {   
        if(App::getLocale() == "ar")
        {
            return json_decode($this->option_1)->ar;
        }
    }
    public function questionOption2()
    {   
        if(App::getLocale() == "ar")
        {
            return json_decode($this->option_2)->ar;
        }
    }    
    public function questionOption3()
    {   
        if(App::getLocale() == "ar")
        {
            return json_decode($this->option_3)->ar;
        }
    }   
    public function questionOption4()
    {   
        if(App::getLocale() == "ar")
        {
            return json_decode($this->option_4)->ar;
        }
    } 
}
