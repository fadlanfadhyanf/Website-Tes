<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Categories::get();
        return view('categories.index',['data'=>$data, 'title'=>"Kategori"]);
    }

    public function store(Request $request)
    {
        Categories::create($request->all());
        return back()->with('success','Data berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $cek = Categories::find($id)->first();
        if($cek){
            Categories::find($id)->update($request->all());
            return back()->with('success','Data Berhasil diedit');
        }
            return back()->with('danger','Data Tidak ditemukan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cek = Categories::find($id)->first();
        if($cek){
            Categories::find($id)->delete();
            return back()->with('success','Data Berhasil dihapus');
        }
            return back()->with('danger','Data Tidak ditemukan');
    }
}
