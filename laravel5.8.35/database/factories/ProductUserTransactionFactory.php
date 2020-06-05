<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductUserTransaction;
use Faker\Generator as Faker;

$factory->define(ProductUserTransaction::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'product_id' => 1,
        'code_id' => 1,
        'type' => 2,
        'point' => 10,
        'created_at' => '2020-01-01 00:00:00',
    ];
});
