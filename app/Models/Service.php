<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['cust_id', 'service_name', 'base_price'];

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'service_id');
    }
}
