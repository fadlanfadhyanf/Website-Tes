<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = "carts";
    public $timestamps = false;
    protected $fillable = [
        'id_product',
        'qty'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'id_product', 'id');
    }

}
