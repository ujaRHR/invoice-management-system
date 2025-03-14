<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['cust_id', 'fullname', 'email', 'company', 'country'];

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'client_id');
    }
}
