<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = ['operator_type', 'fullname', 'email', 'password', 'phone', 'password_reset_token', 'password_reset_expires'];
}
