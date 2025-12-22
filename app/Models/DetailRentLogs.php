<?php

namespace App\Models;

use App\Models\RentLogs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailRentLogs extends Model
{
    protected $table = 'detail_rent_logs';
    protected $fillable = [
        'id_transaksi_rental', 'id_barang', 'harga_sewa'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }

    public function rentLog()
    {
        return $this->belongsTo(RentLogs::class, 'id_transaksi_rental');
    }
}
