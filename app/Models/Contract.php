<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'Start_Date',
        'End_Date',
        'Growth_Salary',
        'Net_Salary',
        'job_position_id',
        'employee_id',
   
    ];

    public function employee()
{
    return $this->belongsTo(User::class);
}

public function jobPosition()
{
    return $this->belongsTo(JobPosition::class);
}

}
