<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // Mengambil ID pengguna yang sedang login
        $rentLogs = RentLogs::where('id_user', $userId)->get(); // Mengambil data penyewaan berdasarkan ID pengguna

        return view('client.pembayaran', compact('rentLogs'));
    }

    public function uploadBukti(Request $request)
    {
        $request->validate([
            'rentLog_id' => 'required|exists:rent_logs,id',
            'bukti_penyerahan' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        $rentLog = RentLogs::find($request->rentLog_id);

        if ($request->hasFile('bukti_penyerahan')) {
            $file = $request->file('bukti_penyerahan');
            $path = $file->store('bukti_penyerahan', 'public');

            // Simpan path bukti penyerahan ke database
            $rentLog->bukti_penyerahan = $path;
            $rentLog->status = 'Pending'; // Atur status menjadi Completed atau sesuai kebutuhan
            $rentLog->save();
        }

        return redirect()->route('pembayaran.index')->with('success', 'Bukti penyerahan berhasil diunggah.');
    }

    public function submitTanggalPengembalian(Request $request)
    {
        $request->validate([
            'rentLog_id_return' => 'required|exists:rent_logs,id',
            'actual_return_date' => 'required|date',
        ]);

        $rentLog = RentLogs::findOrFail($request->rentLog_id_return);

        // Parse the return dates
        $returnDate = Carbon::parse($rentLog->return_date);
        $actualReturnDate = Carbon::parse($request->actual_return_date);

        // Initialize total denda
        $totalDenda = 0;

        // Calculate penalty only if actual return date is later than the return date
        if ($actualReturnDate->greaterThan($returnDate)) {
            $diffInDays = $actualReturnDate->diffInDays($returnDate);
            $dendaPerHari = 5000;
            $totalDenda = $diffInDays * $dendaPerHari;
        }

        // Store information in the session
        session()->put('rentLog_id_return', $rentLog->id);
        session()->put('actual_return_date', $request->actual_return_date);
        session()->put('total_denda', $totalDenda);

        return redirect()->back()->with('success_actual_return_date', 'Tanggal pengembalian sebenarnya berhasil disimpan. Total denda: Rp ' . number_format($totalDenda));
    }


    public function uploadBuktiPengembalian(Request $request)
    {
        $request->validate([
            'rentLog_id_return' => 'required',
            'bukti_pengembalian' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        $rentLog = RentLogs::findOrFail($request->rentLog_id_return);

        if ($request->hasFile('bukti_pengembalian')) {
            $file = $request->file('bukti_pengembalian');
            $path = $file->store('bukti_pengembalian', 'public');

            // Simpan path bukti pengembalian ke database
            $rentLog->bukti_pengembalian = $path;
        }

        // Simpan actual return date, total denda, dan status
        $rentLog->actual_return_date = session('actual_return_date');
        $rentLog->total_denda = session('total_denda');
        $rentLog->status = 'Pending Pengembalian'; // Atur status sesuai kebutuhan
        $rentLog->save();

        return redirect()->back()->with('success_return', 'Bukti pengembalian berhasil diunggah. Total denda: Rp ' . number_format(session('total_denda')));
    }

}
