<?php

namespace App\Models;

use Database\Factories\SomeFancyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    public $timestamps = false;
    protected $table = 'password_resets';
}