<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App; 

class Level extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function name()
    {
        if(App::getLocale() == "ar")
        {
            return json_decode($this->name)->ar;
        }
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

}
