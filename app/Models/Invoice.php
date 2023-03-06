<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'client_id',
        'company_id',
        'invoice_number',
        'payment_term',
        'status',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function companies()
    {
        return $this->belongsTo(Company::class);
    }
    public function invoice()
    {
        return $this->belongsTo(Client::class);
    }

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
