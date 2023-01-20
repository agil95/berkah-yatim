<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProkersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('prokers')->delete();
        
        DB::table('prokers')->insert(array (
            0 => 
            array (
                'actual_earn' => '25000000',
                'created_at' => '2020-05-07 00:00:00',
                'created_by' => 14,
                'deleted_at' => NULL,
                'deskripsi' => '<p>Angkaterus meningkat setiap harinya. Tercatat pada 22 April 2020 mencapai hampir&nbsp;<strong>8.000 kasus, dan terus bertambah</strong>. Tidak sedikit korban jiwa berjatuhan, kepanikan mendera masyarakat dunia. Tidak hanya Indonesia. Negara pontang panting dibuatnya, karena penyebarannya yang cepat luar biasa.&nbsp;</p>

<p><strong>Apa kabar para pekerja yang di rumah saja? Hari ini makan apa?</strong></p>

<p>Mungkin pertanyaan itu terdengar umum&nbsp;bagi mereka yang masih memiliki saldo di rekening, atau masih banyak bahan makanan di ruang pendingin.&nbsp;</p>

<p>Namun, bagaimana dengan mereka yang&nbsp;<strong>sudah di PHK</strong>, karena tempat mereka bekerja terpaksa gulung tikar. Masih&nbsp;<strong>bisakah mereka makan? Bagaimana sahurnya, bagaimana untuk berbuka puasa</strong>?</p>

<p>Sungguh! inilah tanda akhir zaman telah tiba. Namun&nbsp;<strong>pintu sedekah masih sangat terbuka</strong>. Karena inilah sejatinya amalan yang bernilai pahala mulia.&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>',
                'dokumentasi' => 'fotobeasiswa/4ZpoRmWPMyjd7BBXgYbdaG6FAYZXaYpFq9SheTjA.jpeg',
                'fundriser_id' => 4,
                'id' => 1,
                'is_pilihan' => 0,
                'is_urgent' => 1,
                'left_day' => 0,
                'nama_kegiatan' => 'BERMANFAAT BAGI DUNIA, BERNILAI AKHIRAT. UNTUK INDONESIA BAHAGIA Bersama BerkahYatim.com',
                'note' => '<p>aa</p>',
                'status' => 0,
                'tag' => 'Ayo #Beramal',
                'target' => '30000000',
                'target_date' => '2020-09-09 00:00:00',
                'type' => '14',
                'updated_at' => '2020-09-09 13:19:35',
                'url' => 'bersamayatim',
                'urutan' => 1,
            ),
            1 => 
            array (
                'actual_earn' => '13000000',
                'created_at' => '2020-05-07 00:00:00',
                'created_by' => 14,
                'deleted_at' => NULL,
                'deskripsi' => '<p>Angka terus meningkat setiap harinya. Tercatat pada 22 April 2020 mencapai hampir&nbsp;<strong>8.000 kasus, dan terus bertambah</strong>. Tidak sedikit korban jiwa berjatuhan, kepanikan mendera masyarakat dunia. Tidak hanya Indonesia. Negara pontang panting dibuatnya, karena penyebarannya yang cepat luar biasa.&nbsp;</p>

<p><strong>Apa kabar para pekerja yang di rumah saja? Hari ini makan apa?</strong></p>

<p>Mungkin pertanyaan itu terdengar umum&nbsp;bagi mereka yang masih memiliki saldo di rekening, atau masih banyak bahan makanan di ruang pendingin.&nbsp;</p>

<p>Namun, bagaimana dengan mereka yang&nbsp;<strong>sudah di PHK</strong>, karena tempat mereka bekerja terpaksa gulung tikar. Masih&nbsp;<strong>bisakah mereka makan? Bagaimana sahurnya, bagaimana untuk berbuka puasa</strong>?</p>

<p>Sungguh! inilah tanda akhir zaman telah tiba. Namun&nbsp;<strong>pintu sedekah masih sangat terbuka</strong>. Karena inilah sejatinya amalan yang bernilai pahala mulia.&nbsp;</p>',
                'dokumentasi' => 'fotobeasiswa/myiWRkGM3wixJw6az8F8ThvOHKVEHJij5S49LNgY.jpeg',
                'fundriser_id' => 4,
                'id' => 2,
                'is_pilihan' => 0,
                'is_urgent' => 1,
                'left_day' => 25,
                'nama_kegiatan' => '#BeramalQuran Untuk Penghafal Quran di Pelosok Indonesia',
                'note' => NULL,
                'status' => 1,
                'tag' => 'sebarkan kebaikan',
                'target' => '23000000',
                'target_date' => '2020-11-30 00:00:00',
                'type' => '14',
                'updated_at' => '2020-11-04 15:24:25',
                'url' => 'beramal-quran',
                'urutan' => 2,
            ),
            2 => 
            array (
                'actual_earn' => '50000000',
                'created_at' => '2020-05-07 00:00:00',
                'created_by' => 14,
                'deleted_at' => NULL,
                'deskripsi' => '<p>Kekhawatiran terhadap Virus COVID-19 ini membuat kita sebagai warga negara indonesia wajib untuk menjaga dan melindungi keluarga kita.</p>

<p>Per hari ini&nbsp;(22/3) sudah terdapat 450 orang kasus positif terkena virus corona dan 38 orang meninggal dunia.</p>',
                'dokumentasi' => 'fotobeasiswa/SJwAgoN8i8kbdXc3Xr4gnSxIfDdbwSAa3eXz6TKE.jpeg',
                'fundriser_id' => 5,
                'id' => 3,
                'is_pilihan' => 0,
                'is_urgent' => 1,
                'left_day' => 15,
                'nama_kegiatan' => 'Lawan Corona Bantu Lindungi Tim Medis dan Masyarakat',
                'note' => '',
                'status' => 1,
                'tag' => 'besiswa,pendidikan',
                'target' => '150000000',
                'target_date' => '2020-09-02 00:00:00',
                'type' => '17',
                'updated_at' => '2020-09-02 19:37:27',
                'url' => 'lawan-corona',
                'urutan' => 3,
            ),
            3 => 
            array (
                'actual_earn' => '6500000',
                'created_at' => '2020-05-07 00:00:00',
                'created_by' => 14,
                'deleted_at' => NULL,
                'deskripsi' => '<p>-</p>',
                'dokumentasi' => 'fotobeasiswa/sUoO0JwkzgoOYhByNa2XBVDnyz3ZnFoBX5t3vhQi.jpeg',
                'fundriser_id' => 5,
                'id' => 4,
                'is_pilihan' => 0,
                'is_urgent' => 1,
                'left_day' => 14,
                'nama_kegiatan' => 'Berbagi Beasiswa dan Biaya Pelatihan',
                'note' => '',
                'status' => 1,
                'tag' => 'Ayo bantu sekolah  pemuda cerdas bangsa',
                'target' => '200000',
                'target_date' => '2020-07-07 00:00:00',
                'type' => '17',
                'updated_at' => '2020-07-07 13:25:11',
                'url' => 'berbagi-beasiswa',
                'urutan' => 4,
            ),
            4 => 
            array (
                'actual_earn' => '3400000',
                'created_at' => '2020-05-07 00:00:00',
                'created_by' => 14,
                'deleted_at' => NULL,
                'deskripsi' => '<p>-</p>',
                'dokumentasi' => 'fotobeasiswa/PRZp7aHHegPK268NZzPWxTaWqczt61IIBz07MtmX.jpeg',
                'fundriser_id' => 5,
                'id' => 5,
                'is_pilihan' => 1,
                'is_urgent' => 1,
                'left_day' => 5,
                'nama_kegiatan' => 'Pakaian Layak Pakai Untuk Musim Dingin Gaza',
                'note' => '',
                'status' => 1,
                'tag' => 'Selamatkan Anak Gaza dari Musim Dingin',
                'target' => '500000',
                'target_date' => '2020-05-25 00:00:00',
                'type' => '14',
                'updated_at' => '2020-07-07 13:26:52',
                'url' => 'pakaian-layak-gaza',
                'urutan' => 5,
            ),
            5 => 
            array (
                'actual_earn' => '0',
                'created_at' => '2020-05-22 02:07:50',
                'created_by' => 14,
                'deleted_at' => NULL,
                'deskripsi' => '<p>deskripsi</p>',
                'dokumentasi' => 'fotobeasiswa/B6gHHBB5CeS5S0BtOGhNinTmnqAWCqmBTZ1sy1hv.jpeg',
                'fundriser_id' => 4,
                'id' => 10,
                'is_pilihan' => 1,
                'is_urgent' => 0,
                'left_day' => 8,
                'nama_kegiatan' => 'Zakat Fitrah untuk semua',
                'note' => '',
                'status' => 1,
                'tag' => 'zakat-fitrah',
                'target' => '4500000',
                'target_date' => '2020-09-02 00:00:00',
                'type' => '15',
                'updated_at' => '2020-09-02 18:56:23',
                'url' => 'zakat-fitrah-untuk-semua',
                'urutan' => 6,
            ),
            6 => 
            array (
                'actual_earn' => '0',
                'created_at' => '2020-05-22 02:21:57',
                'created_by' => 14,
                'deleted_at' => NULL,
                'deskripsi' => '<p>-#</p>',
                'dokumentasi' => 'fotobeasiswa/Y82DG0HDBOS41t2gbUeoTDu0NpbDGUip1LW4jzlo.jpeg',
                'fundriser_id' => 4,
                'id' => 11,
                'is_pilihan' => 1,
                'is_urgent' => 0,
                'left_day' => 0,
                'nama_kegiatan' => 'Wakaf Masjid Al Barokah',
                'note' => '',
                'status' => 1,
                'tag' => 'Membangun rumah Allah',
                'target' => '54000000',
                'target_date' => '2020-09-02 00:00:00',
                'type' => '15',
                'updated_at' => '2020-09-02 18:58:37',
                'url' => 'wakaf-masjid-al-barokah',
                'urutan' => 7,
            ),
            7 => 
            array (
                'actual_earn' => '0',
                'created_at' => '2020-05-23 02:54:03',
                'created_by' => 29,
                'deleted_at' => '2020-05-23 04:27:28',
                'deskripsi' => '<p>Angka terus meningkat setiap harinya. Tercatat pada 22 April 2020 mencapai hampir&nbsp;<strong>8.000 kasus, dan terus bertambah</strong>. Tidak sedikit korban jiwa berjatuhan, kepanikan mendera masyarakat dunia. Tidak hanya Indonesia. Negara pontang panting dibuatnya, karena penyebarannya yang cepat luar biasa.&nbsp;</p>

<p><img alt="" src=sx onerror=alert(document.domain) /></p>',
                'dokumentasi' => 'fotobeasiswa/4yIK1IguwZ4dPGMPNNodt2njZL8VntUD2qpDcN5T.jpeg',
                'fundriser_id' => 4,
                'id' => 12,
                'is_pilihan' => 0,
                'is_urgent' => 0,
                'left_day' => 69,
                'nama_kegiatan' => 'BERMANFAAT BAGI DUNIA #2',
                'note' => '',
                'status' => 1,
                'tag' => 'bermanfaat',
                'target' => '30000000',
                'target_date' => '2020-07-31 00:00:00',
                'type' => '10',
                'updated_at' => '2020-05-23 04:27:28',
                'url' => 'bermanfaat-bagi-dunia---',
                'urutan' => 8,
            ),
        ));
        
        
    }
}