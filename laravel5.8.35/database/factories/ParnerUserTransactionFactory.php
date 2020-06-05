<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ParnerUserTransaction;
use Faker\Generator as Faker;

$factory->define(ParnerUserTransaction::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'parner_id' => 1,
        'parner_user_id' => 1,
        'type' => 2,
        'point' => 10,
        'discount' => 50,
        'created_at' => '2020-01-01 00:00:00',
    ];
});
