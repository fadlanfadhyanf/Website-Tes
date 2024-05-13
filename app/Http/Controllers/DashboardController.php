<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\Categories;
use App\Models\Transaction;
use App\Models\Transaction_detail;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
        $date = Carbon::now();
        $data = [
            'monthPay'=> Transaction::where('created_at',$date)
        ];
        // return view('dashboard.index',$data);
        DD($data);

        // ricky.afdillah@gmail.com 
        // @miadwis1
        // @miadwis
    }

}
