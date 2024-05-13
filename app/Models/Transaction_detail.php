<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction_detail extends Model
{
    protected $table = 'transaction_details';
    public $timestamps = false;
    protected $fillable = [
        'id_transaction',
        'id_product',
        'qty',
        'price'
    ];
}
