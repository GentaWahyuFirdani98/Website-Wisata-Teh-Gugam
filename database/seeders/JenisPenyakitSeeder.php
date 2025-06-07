<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisPenyakit;

class JenisPenyakitSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_penyakit' => 'Blister Blight',
                'deskripsi' => 'Si perusak daun muda. Jamur Exobasidium vexans menyebabkan gelembung kecil pada daun muda, terutama saat musim hujan. Jika dibiarkan, dapat menurunkan kualitas panen.'
            ],
            [
                'nama_penyakit' => 'Brown Blight',
                'deskripsi' => 'Si Penyebar Noda Cokelat. Jamur Colletotrichum camelliae membentuk bercak coklat tak beraturan yang membuat daun rontok. Umumnya muncul di cuaca lembab dan minim sinar matahari.'
            ],
            [
                'nama_penyakit' => 'Gray blight',
                'deskripsi' => 'Bercak abu-abu hingga cokelat kehitaman dikelilingi warna kuning yang membuat daun terlihat muram. Disebabkan jamur Pestalotiopsis theae dan menyerang daun yang lebih tua.'
            ],
            [
                'nama_penyakit' => 'Red Rust',
                'deskripsi' => 'Bercak jingga kemerahan mencolok akibat ganggang Cephaleuros parasiticus. Mengganggu jaringan tanaman dan mengurangi hasil panen. Sering muncul di tempat lembab dengan sirkulasi udara buruk.'
            ],
            [
                'nama_penyakit' => 'T1',
                'deskripsi' => 'Kualitas terbaik. Daun masih sangat muda, berwarna hijau cerah, utuh, dan belum terbuka penuh. Cocok untuk teh premium dengan rasa dan aroma unggulan.'
            ],
            [
                'nama_penyakit' => 'T2',
                'deskripsi' => 'Kualitas bagus. Daun muda yang mulai membuka sedikit. Masih layak untuk teh berkualitas tinggi dengan sedikit penurunan rasa dan aroma dibanding T1.'
            ],
            [
                'nama_penyakit' => 'T3',
                'deskripsi' => 'Kualitas sedang. Daun sudah lebih terbuka dan usia sedikit lebih tua. Umumnya digunakan untuk produk teh standar atau campuran.'
            ],
            [
                'nama_penyakit' => 'T4',
                'deskripsi' => 'Kualitas rendah. Daun tua, bisa berwarna kusam atau ada sedikit kerusakan. Biasanya digunakan untuk teh massal atau kebutuhan industri.'
            ]
        ];

        foreach ($data as $item) {
            JenisPenyakit::create($item);
        }
    }
}
