<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class CustomerProfile extends Model
{
    use HasFactory;

    protected $fillable = ['cust_id', 'profile_picture', 'bio', 'phone', 'gender', 'dob', 'address', 'country', 'website', 'linkedin', 'twitter', 'language', 'timezone', 'status', 'is_verified'];

    public function profile()
    {
        return $this->hasMany(Customer::class, 'cust_id');
    }
}
