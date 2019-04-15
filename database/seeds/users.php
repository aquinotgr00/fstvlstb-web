<?php

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

                [
                    'name' => 'admin',
                    'email' => 'admin@admin.com',
                    'password' => '$2y$10$N5s1Mc28.XIdLres3ibT.ek8QEb0wTvJUVlJnApBB0MSWVmNCa0Wq'
                ],
    }
}
