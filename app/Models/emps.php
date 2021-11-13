<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emps extends Model
{
    use HasFactory;

    protected $fillabel = ['empnum' , 'empname'];

    public function attendance()
    {
        return $this->hasMany(attendance::class);

    }
}
