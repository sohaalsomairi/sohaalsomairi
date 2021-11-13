<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    use HasFactory;
    protected $table = 'attendance';

    protected $fillable = ['attendance_date','emps_id'];

    public function emp()
    {
        return $this->belongsTo(emps::class,'emps_id');

    }
}
