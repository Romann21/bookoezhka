<?php


// app/Models/User.php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'login',
        'name', 
        'phone',
         'email', 
          'password'
    ];
    
    public function cards()
    {
        return $this->hasMany(BookCard::class);
    }
}