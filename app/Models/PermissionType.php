<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionType extends Model
{
    protected $fillable = [
        'TypeName',
        'Description',
        'Status',
    ];
    public function permissions()
{
    return $this->hasMany(Permission::class, 'Permission_Type_id');
}

}
