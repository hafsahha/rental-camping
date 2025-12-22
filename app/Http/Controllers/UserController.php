<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use App\Models\DetailRentLogs;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
session_id('tubesrentaldpw');
session_start();

class UserController extends Controller
{
    public function profile()
    {
        $user = auth()->user(); 

        return view('client.profile', compact('user'));
    }

    public function barang(){
        $cart = session()->get('cart', []);
        $data = Barang::get();
        return view('client.barang', compact('data', 'cart'));
    }

    public function addToCart(Request $request)
    {
        $barang = Barang::find($request->id_barang);
        $cart = session()->get('cart', []);

        if (isset($cart[$request->id_barang])) {
            $cart[$request->id_barang]['qty']++;
        } else {
            $cart[$request->id_barang] = [
                "id_barang" => $barang->id,
                "nama" => $barang->nama,
                "qty" => 1,
                "harga_sewa" => $barang->harga_sewa,
                "deskripsi" => $barang->deskripsi,
                "foto" => $barang->foto
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['success' => 'Barang berhasil ditambahkan ke keranjang']);
    }

    public function sewa() {
        $cart = session()->get('cart', []);
        return view('client.sewa', compact('cart'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_penyewa' => 'required|string|max:255',
            'lama_hari' => 'required|integer|min:1',
            'total_harga_sewa' => 'required|integer',
            'id_barang' => 'required|array',
            'id_barang.*' => 'integer',
            'harga_sewa' => 'required|array',
            'harga_sewa.*' => 'integer'
        ]);

        $rentLog = new RentLogs();
        $rentLog->id_user = auth()->id(); 
        $rentLog->nama_penyewa = $validatedData['nama_penyewa'];
        $rentLog->rent_date = Carbon::now();
        $rentLog->return_date = Carbon::now()->addDays($validatedData['lama_hari']);
        $rentLog->lama_hari = $validatedData['lama_hari'];
        $rentLog->total_harga_sewa = $validatedData['total_harga_sewa'];

        $rentLog->save();

        foreach ($validatedData['id_barang'] as $index => $id_barang) {
            $detailRentLog = new DetailRentLogs();
            $detailRentLog->id_transaksi_rental = $rentLog->id;
            $detailRentLog->id_barang = $id_barang;
            $detailRentLog->harga_sewa = $validatedData['harga_sewa'][$index];
            $detailRentLog->save();
        }

        return redirect()->route('pembayaran.index')->with('success_penyewaan', 'Penyewaan berhasil disimpan');
    }
    
    public function show($id)
    {
        $rentLog = RentLogs::findOrFail($id);
        $detailRentLogs = DetailRentLogs::with('barang')->where('id_transaksi_rental', $id)->get();

        return view('client.detail_rent_logs', compact('rentLog', 'detailRentLogs'));
    }

    public function showDetailBarang($id)
    {
        $barang = Barang::findOrFail($id);
        return view('client.detailBarang', compact('barang'));
    }

    
}
