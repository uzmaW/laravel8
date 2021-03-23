<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];

    protected $table = 'roles';

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_roles');
    }

    public function permissions() {

        return $this->belongsToMany(Permission::class,'permissions_roles');
            
    }
}
