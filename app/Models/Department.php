<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'Department_Name',
        'Location',

    ];
    public function jobPositions()
{
    return $this->hasMany(JobPosition::class);
}
public function employees()
{
    return $this->hasMany(User::class);
}

}
