<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use App\Models\DetailRentLogs;

class AdminController extends Controller
{
    public function index()
    {
        $rentLogs = RentLogs::with('details.barang')->get();
        return view('admin.dashboard', compact('rentLogs'));
    }

    public function approve($id)
    {
        $rentLog = RentLogs::findOrFail($id);
        $rentLog->status = 'dipinjam';
        $rentLog->save();

        // Update status barang to 'tidak tersedia'
        foreach ($rentLog->details as $detail) {
            $barang = Barang::find($detail->id_barang);
            if ($barang) {
                $barang->status = 'tidak tersedia';
                $barang->save();
            }
        }

        return redirect()->route('admin.rent_logs')->with('success', 'Peminjaman disetujui dan barang telah diperbarui.');
    }

    public function approveReturn(Request $request, $id)
    {
        $rentLog = RentLogs::find($id);
        if ($rentLog) {
            $rentLog->status = 'dikembalikan';
            $rentLog->save();

            // Update the status of the related items to 'tersedia'
            $details = DetailRentLogs::where('id_transaksi_rental', $id)->get();
            foreach ($details as $detail) {
                $detail->barang->status = 'tersedia';
                $detail->barang->save();
            }

            return redirect()->back()->with('success', 'Pengembalian disetujui.');
        }

        return redirect()->back()->with('error', 'Penyewaan tidak ditemukan.');
    }

    public function laporanKeuangan()
    {
        // Menghitung jumlah transaksi yang telah diapprove oleh admin atau memiliki status "dipinjam"
        $approvedTransactionsCount = RentLogs::where('status', 'approved')->orWhere('status', 'dipinjam')->count();

        // Menghitung total denda untuk transaksi dengan status "dikembalikan"
        $totalPenalty = RentLogs::where('status', 'dikembalikan')->sum('total_denda');

        $totalRevenue = RentLogs::where('status', 'approved')->orWhere('status', 'dipinjam')->orWhere('status', 'dikembalikan')->sum('total_harga_sewa');

        $totalRevenueFormatted = "Rp " . number_format($totalRevenue, 0, ',', '.');

        $totalPenaltyFormatted = "Rp " . number_format($totalPenalty, 0, ',', '.');

        $approvedTransactions = RentLogs::whereIn('status', ['approved', 'dipinjam', 'dikembalikan'])->get();

        return view('admin.laporanKeuangan', compact('approvedTransactions', 'totalPenaltyFormatted', 'totalRevenueFormatted'));
    }

    public function topTransactions()
    {
        $topTransactions = RentLogs::whereIn('status', ['dipinjam', 'dikembalikan'])->orderByDesc('total_harga_sewa')->limit(10)->get();
        return view('admin.top_transactions', compact('topTransactions'));
    }

    public function indexBarang()
    {
        $barang = Barang::all();
        return view('admin.barang.index', compact('barang'));
    }

    public function createOrEditBarang($id = null)
    {
        $barang = $id ? Barang::findOrFail($id) : null;
        return view('admin.barang.create-edit', compact('barang'));
    }

    public function storeBarang(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga_sewa' => 'required|numeric',
            'status' => 'required|string',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $barang = new Barang($request->all());

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('images', 'public');
            $barang->foto = $path;
        }

        $barang->save();

        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function updateBarang(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga_sewa' => 'required|numeric',
            'status' => 'required|string',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->fill($request->all());

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('images', 'public');
            $barang->foto = $path;
        }

        $barang->save();

        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    public function deleteBarang($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('admin.barang.index')->with('success', 'Barang berhasil dihapus.');
    }

}
