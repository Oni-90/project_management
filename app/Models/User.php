<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'email',
        'gender',
        'role',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function roleable()
    {
        return $this->morphTo();
    }
}
