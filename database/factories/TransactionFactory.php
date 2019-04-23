<?php

use Faker\Generator as Faker;

$productPrices = App\Product::get('price')->toArray();

$factory->define(App\Transaction::class, function (Faker $faker, $productPrices) {
    return [
        'subdistrict_id' => $faker->numberBetween(1101010, 9471040),
        'product_id' => $faker->numberBetween(1, 5),
        'account_id' => $faker->numberBetween(1, 5),
        'address' => $faker->address,
        'postal_code' => $faker->postcode,
        'quantity' => 1,
        'amount' => '50000',
        'courier_name' => $faker->randomElement(['JNE', 'POS', 'TIKI']),
        'courier_type' => $faker->numberBetween(1, 5),
        'courier_fee' => $faker->randomNumber(5),
        'item' => [
            'size' => $faker->randomElement(['XS', 'S', 'M', 'L', 'XL']),
            'quantity' => 1,
            'price' => '50000',
            'subtotal' => '50000'
        ]
    ];
});
