<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sondages;
use Faker\Generator as Faker;

$factory->define(Sondages::class, function (Faker $faker) {
    return [
        // Generate a word to assign it to the `name`
        'name' => $faker->word()
    ];
});
