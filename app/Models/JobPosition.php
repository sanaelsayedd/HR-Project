<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jobPosition extends Model
{
    protected $fillable = [
        'Job_Title',
        'Job_Description',
        'department_id',

    ];
    public function contracts()
{
    return $this->hasMany(Contract::class);
}
public function department()
{
    return $this->belongsTo(Department::class);
}


}
