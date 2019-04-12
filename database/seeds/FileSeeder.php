<?php

use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('files')->insert([

                [
                    'name' => 'gas!',
                    'contents' => 'GAS!.zip',
                    'counter' => 0,
                    'status'=>'active',
                ]
            ]);
    }
}
