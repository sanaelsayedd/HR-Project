<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VacationType extends Model
{
    protected $fillable = [
        'TypeName',
        'Description',
        'Max_Days',


    ];
    public function vacations()
{
    return $this->hasMany(Vacation::class, 'VacationTypeID');
}

}
