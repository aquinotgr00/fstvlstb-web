<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Account::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->e164PhoneNumber,
        'address' =>$faker->address,
        'gender'=>'L',
        'dob'=>'01/01/1970',
        'images'=>'uploads/5cb9a27d42d77-arin.jpg',
        'password' => Hash::make('secret'), // secret
        'remember_token' => str_random(10),
    ];
});
