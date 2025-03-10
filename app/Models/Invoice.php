<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Service;
use App\Models\PaymentMethod;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['cust_id', 'client_id', 'invoice_number', 'service_id', 'quantity', 'unit_price', 'issue_date', 'due_date', 'amount', 'tax', 'total_amount', 'status', 'payment_method', 'notes'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'cust_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method');
    }
}
