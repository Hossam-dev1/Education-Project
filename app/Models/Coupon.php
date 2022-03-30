<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
