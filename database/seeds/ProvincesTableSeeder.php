<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("
            INSERT INTO `provinces` (`id`, `name`, `created_at`, `updated_at`) VALUES
            (1, 'Bali', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (2, 'Bangka Belitung', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (3, 'Banten', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (4, 'Bengkulu', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (5, 'DI Yogyakarta', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (6, 'DKI Jakarta', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (7, 'Gorontalo', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (8, 'Jambi', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (9, 'Jawa Barat', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (10, 'Jawa Tengah', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (11, 'Jawa Timur', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (12, 'Kalimantan Barat', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (13, 'Kalimantan Selatan', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (14, 'Kalimantan Tengah', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (15, 'Kalimantan Timur', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (16, 'Kalimantan Utara', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (17, 'Kepulauan Riau', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (18, 'Lampung', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (19, 'Maluku', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (20, 'Maluku Utara', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (21, 'Nanggroe Aceh Darussalam (NAD)', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (22, 'Nusa Tenggara Barat (NTB)', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (23, 'Nusa Tenggara Timur (NTT)', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (24, 'Papua', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (25, 'Papua Barat', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (26, 'Riau', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (27, 'Sulawesi Barat', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (28, 'Sulawesi Selatan', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (29, 'Sulawesi Tengah', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (30, 'Sulawesi Tenggara', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (31, 'Sulawesi Utara', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (32, 'Sumatera Barat', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (33, 'Sumatera Selatan', '2018-02-13 16:33:51', '2018-02-13 16:33:51'),
            (34, 'Sumatera Utara', '2018-02-13 16:33:51', '2018-02-13 16:33:51');
        ");
    }
}
