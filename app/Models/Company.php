<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'tin',
        'name',
        'address',
        'city',
        'phone_number',
        'bank_account',
        'email',
        'deleted_at'

    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
