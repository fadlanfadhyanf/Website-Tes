<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\products;
use App\Models\Categories;
use App\Models\Transaction;
use App\Models\Transaction_detail;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $data = Products::with('category')->get();
        $cart = Cart::with('product')->get();
        $category = Categories::all();
        return view('product.index',['data'=>$data, 'title'=>"Produk",'category'=>$category,'cart'=>$cart]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate( [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('image');
        $image->storeAs('public/produk', $image->hashName());

        Products::add($request,$image);
        return back()->with('success','Data berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cek = Products::find($id)->first();
        if($cek){
            $gambar = $request->image;
            if($gambar == !null){
                $request->validate( [
                    'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $image = $request->file('image');
                $image->storeAs('public/image', $image->hashName());

                Products::edit($id,$request, $image);
                return back()->with('success','Data Berhasil diedit');
            }
            Products::find($id)->update($request->except('image'));
            return back()->with('success','Data Berhasil diedit');
        }
            return back()->with('danger','Data Tidak ditemukan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
        $cek = Products::find($id)->first();
        if($cek){
            Products::find($id)->delete();
            return back()->with('success','Data Berhasil dihapus');
        }
            return back()->with('danger','Data Tidak ditemukan');
    }    
    public function select(Request $req){

        $product = Products::find($req->id_product);
        if (!$product) {
            return back()->with('danger', 'Produk tidak ditemukan');
        }
        $existingCart = Cart::where('id_product', $req->id_product)->first();
        if ($existingCart) {
            $totalQuantity = $req->qty + $existingCart->qty;
            if ($totalQuantity > $product->stok) {
                return back()->with('danger', 'Stok tidak cukup');
            }
            $existingCart->update(['qty' => $totalQuantity]);
            return back()->with('success', 'Kuantitas berhasil diperbarui');
        } else {
            if ($req->qty > $product->stok) {
                return back()->with('danger', 'Stok tidak cukup');
            }
            Cart::create($req->all());
            return back()->with('success', 'Barang berhasil dimasukkan ke keranjang');
        }
    }

    public function pay(Request $request){
        if($request->bayar < $request->total){
            return back()->with('danger','Uang yang diterima kurang');
        }
        
        $transaction = Transaction::create([
            'total' => $request->total,
            'money_received' => $request->bayar
        ]);

        $cartItems = Cart::all();
        foreach($cartItems as $cartItem){
            Transaction_detail::create([
                'id_transaction' => $transaction->id,
                'id_product' => $cartItem->id_product,
                'qty' => $cartItem->qty,
                'price' => $cartItem->product->price_product // Assuming product relationship is defined
            ]);
            $product = $cartItem->product;
            $product->stok -= $cartItem->qty;
            $product->save();
        }
        Cart::truncate();
        $kembalian = 0;
        $kembalian = $request->bayar - $request->total;
        return redirect()->back()->with('success','Pembayaran berhasil');
    }
    
}