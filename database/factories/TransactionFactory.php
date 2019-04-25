<?php

use Faker\Generator as Faker;

//TODO: make a proper transaction factory with order relationship.
$factory->define(App\Transaction::class, function (Faker $faker) {
    return [
        'subdistrict_id' => $faker->numberBetween(1101010, 9471040),
        // 'product_id' => '1',
        'account_id' => $faker->numberBetween(1, 5),
        'address' => $faker->address,
        'postal_code' => '55581',
        'quantity' => 1,
        'status' => 'paid', // toggle this line for different status
        'amount' => '50000',
        'courier_name' => $faker->randomElement(['JNE', 'POS', 'TIKI']),
        'courier_type' => $faker->numberBetween(1, 5),
        'courier_fee' => $faker->randomNumber(5),
        // 'items' => [
        //     'size' => $faker->randomElement(['XS', 'S', 'M', 'L', 'XL']),
        //     'quantity' => 1,
        //     'price' => '50000',
        //     'subtotal' => '50000'
        // ]
    ];
});
