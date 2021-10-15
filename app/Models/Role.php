<?php

namespace App\Models;


use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    public function roles()
    {
        return $this->belongsToMany(Admin::class);
    }
}
