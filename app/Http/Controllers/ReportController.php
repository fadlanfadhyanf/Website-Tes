<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\Transaction_detail;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {   
        return view('laporan.index',['title' => "Laporan"]);
    }
    
    public function month(Request $request){
        $inputMonth = $request->input('month');
        $dateParts = explode('-', $inputMonth);
        $year = $dateParts[0];
        $month = $dateParts[1];
        
        $transactions = Transaction::whereYear('created_at', $year)
                                    ->whereMonth('created_at', $month)
                                    ->get();
        
        return view('laporan.month', ['transactions' => $transactions]);
    }

    public function date(Request $request){
        $transactions = Transaction::whereDate('created_at', $request->date)
                                    ->get();
        return view('laporan.month', ['transactions' => $transactions]);
    }
    
}
