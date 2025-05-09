<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'fullname', 'email', 'password', 'user_type', 'password_reset_token', 'password_reset_expires'];
    protected $hidden = ['password'];

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'cust_id');
    }

    public function profile()
    {
        return $this->hasOne(CustomerProfile::class, 'cust_id');
    }
}
