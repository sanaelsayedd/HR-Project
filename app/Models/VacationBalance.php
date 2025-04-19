<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VacationBalance extends Model
{
    protected $fillable = [
        'Total_balance',
        'Total_Days',
        'Remaining_Days',
        'employee_id',
    ];

    public function employee()
{
    return $this->belongsTo(User::class);
}

}
