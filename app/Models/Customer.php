<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'fullname', 'email', 'password', 'user_type', 'phone', 'address', 'country', 'language', 'is_verified', 'password_reset_token', 'password_reset_expires'];

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'cust_id');
    }
}
