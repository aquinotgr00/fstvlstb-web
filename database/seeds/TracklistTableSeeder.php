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
        //DB::table('tracklists')->truncate();
        DB::table('tracklists')->insert([

            [
                'name' => 'GAS!',
                'content' => 'GAS!-FSTVLST-II-2018.mp3',
                'preview' => 'GAS!-FSTVLST-II-2018-preview.mp3',
                'release_date' => '09/09/2018',
                'status' => 'active',
            ],
            [
                'name' => 'Rupa',
                'release_date' => '17/04/2019',
                'content' => '',
                'preview' => '',
                'status' => 'disabled',
            ],
            [
                'name' => 'Mesin',
                'release_date' => '25/04/2019',
                'content' => '',
                'preview' => '',
                'status' => 'disabled',
            ],
            [
                'name' => 'Sunkan',
                'release_date' => '01/05/2019',
                'content' => '',
                'preview' => '',
                'status' => 'disabled',
            ],
            [
                'name' => 'Syarat',
                'release_date' => '../../2019',
                'content' => '',
                'preview' => '',
                'status' => 'disabled',
            ],
            [
                'name' => 'telan',
                'release_date' => '../../2019',
                'content' => '',
                'preview' => '',
                'status' => 'disabled',
            ],
            [
                'name' => 'Hayat',
                'release_date' => '../../2019',
                'content' => '',
                'preview' => '',
                'status' => 'disabled',
            ],
            [
                'name' => 'Kamis',
                'release_date' => 'Hanya di CD',
                'content' => '',
                'preview' => '',
                'status' => 'disabled',
            ],
            [
                'name' => 'Opus',
                'release_date' => 'Hanya di CD',
                'content' => '',
                'preview' => '',
                'status' => 'disabled',
            ],

        ]);
    }
}
