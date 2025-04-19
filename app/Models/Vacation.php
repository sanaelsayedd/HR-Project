<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    protected $fillable = [
        'employee_id',
        'VacationTypeID',
        'Start_Date',
        'End_Date',
        'Duration',
        'RequestDate',
        'ApprovalDate',
        'Status',
        'Comments',

    ];

    public function employee()
    {
        return $this->belongsTo(User::class);
    }

    // A vacation belongs to a vacation type
    public function vacationType()
    {
        return $this->belongsTo(VacationType::class, 'VacationTypeID');
    }
}
