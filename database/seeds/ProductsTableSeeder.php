<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO: upload image to S3 and adjust the name below.
        DB::table('products')->insert([
            [
                'name' => 'Eceran Kaos',
                'price' => '150000',
                'description' => 'Kain katun 28s, sablon tinta SW 3 warna, sisi depan dan belakang',
                'weight' => '150',
                'has_size' => '1',
                'thumbnail' => 'products/5cc2e69854d75-30593266_333152860422490_8510087658158948352_n.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Eceran Buku Karya Seni, Lirik &amp; Kord',
                'price' => '50000',
                'description' => 'Buku ukuran A2, sampul warna, isi hitam putih, 32 halaman',
                'weight' => '250',
                'has_size' => 0,
                'thumbnail' => 'products/5cc2e69854d75-30593266_333152860422490_8510087658158948352_n.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Eceran Kalung Dogtag dengan NIF',
                'price' => '125000',
                'description' => 'Dogtag berbahan besi stainless dengan nomor NIF-mu, karet peredam, kalung',
                'weight' => '100',
                'has_size' => 0,
                'thumbnail' => 'products/5cc2e69854d75-30593266_333152860422490_8510087658158948352_n.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Eceran Emblem &amp; Peniti',
                'price' => '25000',
                'description' => 'Emblem ukuran 10 x 10 cm, bahan kain Drill, sablon plastisol, border keliling, peniti',
                'weight' => '50',
                'has_size' => 0,
                'thumbnail' => 'products/5cc2e69854d75-30593266_333152860422490_8510087658158948352_n.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Eceran Lakban FSTVLST',
                'price' => '50000',
                'description' => 'Bahan OPP (plastik) lebar 43 mm, 1 roll panjang 60 m',
                'weight' => '50',
                'has_size' => 0,
                'thumbnail' => 'products/5cc2e69854d75-30593266_333152860422490_8510087658158948352_n.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'BOKSET FSTVLST Edisi 01',
                'price' => '350000',
                'description' => 'Kaos, Buku Karya Seni, Lirik &amp; Kord, Kalung Dogtag dengan NIF, Emblem &amp; Peniti, Lakban FSTVLST',
                'weight' => '350',
                'has_size' => 1,
                'thumbnail' => 'products/5cc2e69854d75-30593266_333152860422490_8510087658158948352_n.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
