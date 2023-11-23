<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        $barangs = Barang::all();
        $totalGaransiBerakhir = 0;
        $totalGaransiAktif = 0;
    
        foreach ($barangs as $barang) {
            $start_date = Carbon::parse($barang->start_date);
            $end_date = Carbon::parse($barang->end_date);
            $masa_garansi = $end_date->diffInDays(now());
    
            if ($end_date->isPast()) {
                $barang->status = 'Expired';
                $totalGaransiBerakhir++;
            } else {
                $barang->status = 'Active';
                $totalGaransiAktif++;
            }
    
            $barang->masa_garansi = $masa_garansi . ' Hari';
        }

        return view('dashboard.index', compact('users', 'barangs', 'totalGaransiBerakhir', 'totalGaransiAktif'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
    
        $products = Barang::whereRaw("BINARY kd_barang = ?", [$query])->get();
    
        foreach ($products as $product) {
            $start_date = Carbon::parse($product->start_date);
            $end_date = Carbon::parse($product->end_date);
            $masa_garansi = $start_date->diffInDays($end_date) - Carbon::now()->diffInDays($start_date);
    
            if ($end_date->isFuture()) {
                $product->status = 'Active';
                $masa_garansi = max(0, $masa_garansi) . ' Hari';
            } else {
                $product->status = 'Expired';
                $masa_garansi = '0 Hari';
            }
    
            $product->masa_garansi = $masa_garansi;
        }
    
        return response()->json([
            'data' => $products,
        ]);
    }
    
}
