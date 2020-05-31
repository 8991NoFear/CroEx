<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;
use Faker\Generator as Faker;

use Illuminate\Support\Facades\Hash;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'name' => 'admin 1',
        'email' => 'admin1@admin1.com',
        'password' => Hash::make('12345678'),
    ];
});
