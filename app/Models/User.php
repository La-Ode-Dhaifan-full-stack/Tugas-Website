<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $connection = 'mysql'; // Ganti ke 'mysql'
    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    public function isAdmin()
    {
        return $this->role === 'admin';  // Pastikan kolom 'role' ada di database
    }
}