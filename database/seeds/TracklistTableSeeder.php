<?php

use Illuminate\Database\Seeder;

class TracklistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('tracklists')->insert([

                [
                    'name' => 'GAS!',
                    'content' => 'admin@app.com',
                    'preview' => '',
                    'release_date'=>'09/09/2018',
                    'status'=>'active',
                ],
                [
                    'name' => 'Rupa',
                    'release_date'=>'17/04/2019',
                ],
                [
                    'name' => 'Sunkan',
                    'release_date'=>'25/04/2019',
                ],
                [
                    'name' => 'Agama',
                    'release_date'=>'01/05/2019',
                ],
                [
                    'name' => 'Syarat',
                ],
                [
                    'name' => 'Telan',
                ],
                [
                    'name' => 'Opus',
                ],
                [
                    'name' => 'Kamis',
                ]

            ]);
    }
}
