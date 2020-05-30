<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Code;
use Faker\Generator as Faker;

$factory->define(Code::class, function (Faker $faker) {
    return [
        'code' => $faker->unique()->regexify('[A-Za-z0-9]{32}'),
    ];
});
