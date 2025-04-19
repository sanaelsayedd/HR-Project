<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = [
        'Amount',
        'Deduction',
        'Bonus',
        'date',
        'employee_id',

    ];
    public function employee()
    {
        return $this->belongsTo(User::class);
    }
}
