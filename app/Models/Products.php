<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'id_category',
        'product_code',
        'product_name',
        'stok',
        'price_product',
        'image'
    ];

    public function category()
    {
        return $this->hasMany(Categories::class,'id','id_category');
    }

    public static function add($request,$image){

        Products::create([
            'id_category' => $request->kategori,
            'product_code'=> "PRDK-".Products::generatecodeNumber(),
            'product_name'=> $request->nama,
            'stok'=> $request->stok,
            'price_product'=> $request->harga,
            'image'=> $image->hashName(),
        ]);

        return ;
    }

    public static function edit($id,$request,$image){

        Products::find($id)->update([
            'id_category' => $request->id_category,
            'product_name'=> $request->product_name,
            'stok'=> $request->stok,
            'price_product'=> $request->price_product,
            'image'=> $image->hashName(),
        ]);

        return ;
    }

    public static function generatecodeNumber() {
        $number = mt_rand(1000000000, 9999999999); // better than rand()

        if (Products::codeNumberExists($number)) {
            return generatecodeNumber();
        }
    
        return $number;
    }
    
    public static function codeNumberExists($number) {
        return Products::whereProductCode($number)->exists();
    }
}
