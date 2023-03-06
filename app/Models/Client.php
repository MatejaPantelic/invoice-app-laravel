<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;


    /**
     * @var string[]
     */
    protected $fillable = [
        'tin_jmbg',
        'activity_code',
        'company_name',
        'bank_account',
        'phone_number',
        'name',
        'surname',
        'address',
        'city',
        'email',
        'is_individual',
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class,'client_id');
    }

}
