<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
        ->withPivot('status','coded')->withTimestamps();
    }
}
