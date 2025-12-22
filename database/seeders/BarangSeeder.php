<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_nama = [
            'Tenda Eiger OriginaI X Santalum 4P Tent',
            'Tenda Eiger Lone Bivy Tent Camping 1P',
            'Tenda Eiger Guardian 8P',
            'Tenda Eiger Sianok 3P',
            'Tenda Eiger Pangolin 4P',
            'Sepatu DC Shoecousa',
            'Sepatu New Balance',
            'Sepatu Vans', 
            'Sepatu Nike', 
            'Sepatu Puma', 
            'Sepatu Eiger', 
            'Tas Consina', 
            'Tas Columbia'
        ];
        $data_deskripsi = [
            'Terbuat dari material waterproof polyester dengan konstruksi double-layer serta dilengkapi triangular rag, tenda Santalum 4P ini menawarkan perlindungan yang tahan terhadap kondisi cuaca
            hujan ataupun berangin.',
            'Terbuat dari material polyester berdaya tahan kuat dan anti air, Lone bivy hadir dengan desain minimalis juga ringkas untuk memastikan perlindungan dan kenyamanan Anda terjaga dalam kegiatan camping maupun backpacking.',
            'Guardian 8P adalah tenda kemah yang memiliki dua ruangan dengan sekat yang dapat diisi 8 orang. Tenda ini memiliki 2 buah pintu masuk dengan jala anti nyamuk untuk melindungi Anda dari gigitan serangga.',
            'Tenda ini dilengkapi dengan konstruksi tiang besi yang berdaya tahan kuat dan alas tenda waterproof yang membuat tenda ini dapat kamu andalkan. Disclaimer: Tenda ini dapat digunakan dalam kondisi hujan ringan.',
            'Tenda berkapasitas empat orang dari EIGER Mountaineering ini dirancang dengan vestibule (ruang depan) yang luas untuk menyimpan semua perlengkapanmu dan dua pintu masuk yang juga 
            berfungsi sebagai ventilasi.',
            'Ini sepatu DC Shoecousa',
            'Ini sepatu New Balance',
            'Ini sepatu Vans',
            'Ini sepatu Nike',
            'Ini sepatu Puma',
            'Ini sepatu Eiger',
            'Ini sepatu Consina',
            'Ini sepatu Columbia',
        ];
        $data_harga = [
            30000,
            20000,
            50000,
            25000,
            30000,
            10000,
            20000,
            20000,
            20000,
            20000,
            20000,
            20000,
            20000
        ];
        $data_foto = [
            'images/myimages/Tenda Eiger OriginaI X Santalum 4P Tent.jpg',
            'images/myimages/Tenda Eiger Lone Bivy Tent Camping 1P.jpg',
            'images/myimages/Tenda Eiger Guardian 8P.jpeg',
            'images/myimages/Tenda Eiger Sianok 3P.jpg',
            'images/myimages/Tenda Eiger Pangolin 4P.jpeg',
            'images/myimages/dc.jpg',
            'images/myimages/nb.jpg',
            'images/myimages/vans.jpg',
            'images/myimages/nike.jpg',
            'images/myimages/puma.jpg',
            'images/myimages/eiger.jpg',
            'images/myimages/consina.jpg',
            'images/myimages/columbia.jpg'
        ];

        for($i = 0; $i <= 12; $i++) {
            Barang::insert([
                'nama' => $data_nama[$i],
                'deskripsi' => $data_deskripsi[$i],
                'harga_sewa' => $data_harga[$i],
                'foto' => $data_foto[$i],
            ]);
        }
    }
}
