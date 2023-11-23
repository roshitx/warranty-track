<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();
    
        foreach ($barangs as $barang) {
            $start_date = Carbon::parse($barang->start_date);
            $end_date = Carbon::parse($barang->end_date);
            $masa_garansi = $start_date->diffInDays($end_date) - Carbon::now()->diffInDays($start_date);

            if ($end_date->isFuture()) {
                $barang->status = 'Active';
                $masa_garansi = max(0, $masa_garansi) . ' Hari';
            } else {
                $barang->status = 'Expired';
                $masa_garansi = '0 Hari';
            }
    
            $barang->masa_garansi = $masa_garansi;
        }
    
        return view('dashboard.allbarang', compact('barangs'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string',
            'description' => 'nullable|string',
            'start_date' => 'date|required',
            'end_date' => 'date|required'
        ]);
        $validatedData['kd_barang'] = str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);
        Barang::create($validatedData);
        return redirect()->back()->with('success', "Berhasil menambah data barang!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string',
            'description' => 'nullable|string',
            'start_date' => 'date|required',
            'end_date' => 'date|required'
        ]);

        $barang->update($validatedData);
        return redirect()->back()->with('success', 'Barang berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->back()->with('success', "Berhasil menghapus product");
    }
}
