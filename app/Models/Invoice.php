<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['cust_id', 'client_id', 'invoice_number', 'service_id', 'quantity', 'unit_price', 'issue_date', 'due_date', 'amount', 'tax', 'total_amount', 'status', 'payment_method', 'notes'];
}
