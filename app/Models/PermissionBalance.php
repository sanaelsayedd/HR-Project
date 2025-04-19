<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionBalance extends Model
{
    protected $fillable = [
        'Balance_Amount',
        'employee_id',
        'permissions_id',

    ];
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    // A permission balance belongs to a permission
    public function permission()
    {
        return $this->belongsTo(Permission::class, 'permissions_id');
    }
}
