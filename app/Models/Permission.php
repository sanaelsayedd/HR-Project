<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'user_permissions';
    protected $fillable = [
        'StartDate',
        'EndDate',
        'Status',
        'Permission_Type_id',

    ];
    public function permissionBalances()
{
    return $this->hasMany(PermissionBalance::class, 'permissions_id');
}
public function permissionType()
{
    return $this->belongsTo(PermissionType::class, 'Permission_Type_id');
}
}
