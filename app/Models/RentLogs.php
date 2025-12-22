<?php

namespace App\Models;

use App\Models\DetailRentLogs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RentLogs extends Model
{
    use HasFactory;

    protected $table='rent_logs';
    protected $fillable = [
        'id_user',
        'nama_penyewa',
        'rent_date',
        'return_date',
        'actual_return_date',
        'lama_hari',
        'total_harga_sewa',
        'bukti_penyerahan',
        'bukti_pengembalian',
        'total_denda',
        'status'
    ];

    public function details()
    {
        return $this->hasMany(DetailRentLogs::class, 'id_transaksi_rental');
    }
}
