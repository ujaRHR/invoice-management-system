<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = ['cust_id', 'method_type', 'provider', 'account_details', 'is_default'];

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'payment_method');
    }
}
