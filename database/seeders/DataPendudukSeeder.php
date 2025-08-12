<?php

namespace Database\Seeders;

use App\Models\DataPenduduk;
use Illuminate\Database\Seeder;

class DataPendudukSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['kategori' => 'total_penduduk', 'label' => 'Total Penduduk', 'jumlah' => 702, 'satuan' => 'Jiwa'],
            ['kategori' => 'kepala_keluarga', 'label' => 'KK', 'jumlah' => 185, 'satuan' => 'KK'],
            ['kategori' => 'jenis_kelamin', 'label' => 'Laki-laki', 'jumlah' => 339, 'satuan' => 'Jiwa'],
            ['kategori' => 'jenis_kelamin', 'label' => 'Perempuan', 'jumlah' => 363, 'satuan' => 'Jiwa'],

            // Perkawinan
            ['kategori' => 'perkawinan', 'label' => 'Belum Kawin', 'jumlah' => 430, 'satuan' => 'Jiwa'],
            ['kategori' => 'perkawinan', 'label' => 'Kawin', 'jumlah' => 219, 'satuan' => 'Jiwa'],
            ['kategori' => 'perkawinan', 'label' => 'Cerai Mati', 'jumlah' => 46, 'satuan' => 'Jiwa'],
            ['kategori' => 'perkawinan', 'label' => 'Cerai Hidup', 'jumlah' => 6, 'satuan' => 'Jiwa'],

            // Agama
            ['kategori' => 'agama', 'label' => 'Kristen Protestan', 'jumlah' => 702, 'satuan' => 'Jiwa'],
            ['kategori' => 'agama', 'label' => 'Islam', 'jumlah' => 0, 'satuan' => 'Jiwa'],
            ['kategori' => 'agama', 'label' => 'Katolik', 'jumlah' => 0, 'satuan' => 'Jiwa'],
            ['kategori' => 'agama', 'label' => 'Hindu', 'jumlah' => 0, 'satuan' => 'Jiwa'],
            ['kategori' => 'agama', 'label' => 'Buddha', 'jumlah' => 0, 'satuan' => 'Jiwa'],
            ['kategori' => 'agama', 'label' => 'Kepercayaan lainnya', 'jumlah' => 0, 'satuan' => 'Jiwa'],

            // Pendidikan
            ['kategori' => 'pendidikan', 'label' => 'SLTA', 'jumlah' => 305, 'satuan' => 'Jiwa'],
            ['kategori' => 'pendidikan', 'label' => 'SD', 'jumlah' => 205, 'satuan' => 'Jiwa'],
            ['kategori' => 'pendidikan', 'label' => 'SLTP', 'jumlah' => 105, 'satuan' => 'Jiwa'],
            ['kategori' => 'pendidikan', 'label' => 'Tidak Sekolah', 'jumlah' => 39, 'satuan' => 'Jiwa'],
            ['kategori' => 'pendidikan', 'label' => 'Strata I', 'jumlah' => 32, 'satuan' => 'Jiwa'],
            ['kategori' => 'pendidikan', 'label' => 'Diploma I/II', 'jumlah' => 13, 'satuan' => 'Jiwa'],
            ['kategori' => 'pendidikan', 'label' => 'Akademi/Diploma III/S. Muda', 'jumlah' => 2, 'satuan' => 'Jiwa'],
            ['kategori' => 'pendidikan', 'label' => 'Strata II', 'jumlah' => 1, 'satuan' => 'Jiwa'],
            ['kategori' => 'pendidikan', 'label' => 'S3/Doktor', 'jumlah' => 0, 'satuan' => 'Jiwa'],

            // Pekerjaan
            ['kategori' => 'pekerjaan', 'label' => 'Mahasiswa/Pelajar', 'jumlah' => 277, 'satuan' => 'Jiwa'],
            ['kategori' => 'pekerjaan', 'label' => 'IRT', 'jumlah' => 127, 'satuan' => 'Jiwa'],
            ['kategori' => 'pekerjaan', 'label' => 'Belum/Tidak Bekerja', 'jumlah' => 110, 'satuan' => 'Jiwa'],
            ['kategori' => 'pekerjaan', 'label' => 'Petani/Pekebun', 'jumlah' => 90, 'satuan' => 'Jiwa'],
            ['kategori' => 'pekerjaan', 'label' => 'Karyawan/Honorer', 'jumlah' => 33, 'satuan' => 'Jiwa'],
            ['kategori' => 'pekerjaan', 'label' => 'PNS', 'jumlah' => 19, 'satuan' => 'Jiwa'],
            ['kategori' => 'pekerjaan', 'label' => 'Wiraswasta', 'jumlah' => 18, 'satuan' => 'Jiwa'],
            ['kategori' => 'pekerjaan', 'label' => 'Polri', 'jumlah' => 7, 'satuan' => 'Jiwa'],
            ['kategori' => 'pekerjaan', 'label' => 'Pendeta', 'jumlah' => 6, 'satuan' => 'Jiwa'],
            ['kategori' => 'pekerjaan', 'label' => 'Buruh', 'jumlah' => 4, 'satuan' => 'Jiwa'],
            ['kategori' => 'pekerjaan', 'label' => 'Perawat', 'jumlah' => 4, 'satuan' => 'Jiwa'],
            ['kategori' => 'pekerjaan', 'label' => 'TNI', 'jumlah' => 3, 'satuan' => 'Jiwa'],
            ['kategori' => 'pekerjaan', 'label' => 'Guru', 'jumlah' => 2, 'satuan' => 'Jiwa'],
            ['kategori' => 'pekerjaan', 'label' => 'Pedagang', 'jumlah' => 1, 'satuan' => 'Jiwa'],
            ['kategori' => 'pekerjaan', 'label' => 'Dokter', 'jumlah' => 0, 'satuan' => 'Jiwa'],
        ];

        foreach ($rows as $row) {
            DataPenduduk::updateOrCreate(
                ['kategori' => $row['kategori'], 'label' => $row['label']],
                ['jumlah' => $row['jumlah'], 'satuan' => $row['satuan'] ?? 'Jiwa', 'is_active' => true]
            );
        }
    }
}


