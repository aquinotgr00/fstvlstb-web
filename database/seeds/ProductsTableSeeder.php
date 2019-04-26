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
                'name' => 'kaos',
                'price' => '80000',
                'description' => 'ini kaos putih ada kuningnya.',
                'weight' => '150',
                'has_size' => '1',
                'thumbnail' => 'kaos.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Buku karya seni, lirik & Kord',
                'price' => '50000',
                'description' => 'ini buku yg nyaris seni.',
                'weight' => '250',
                'has_size' => 0,
                'thumbnail' => 'buku.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Kalung Dog Tag Dengan NIF',
                'price' => '40000',
                'description' => 'ini kalung anjing, jangan di pake di kamu.',
                'weight' => '100',
                'has_size' => 0,
                'thumbnail' => 'kalung.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Emblem & Peniti',
                'price' => '20000',
                'description' => 'ini emblem nya dipake, peniti nya...',
                'weight' => '50',
                'has_size' => 0,
                'thumbnail' => 'emblem.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Lakban FSTVLST',
                'price' => '15000',
                'description' => 'ini lakban perekat hubungan.',
                'weight' => '50',
                'has_size' => 0,
                'thumbnail' => 'lakban.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Bokset',
                'price' => '125000',
                'description' => 'ini bokset misterius, jangan dibuka sendiri.',
                'weight' => '350',
                'has_size' => 1,
                'thumbnail' => 'bokset.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
