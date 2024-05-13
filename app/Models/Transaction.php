<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $fillable = [
        'total',
        'money_received'
    ];

    public function detail()
    {
        return $this->hasMany(Transaction_detail::class,'id','id_transaction');
    }

}
