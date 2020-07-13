<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Portfolio;

$factory->define(Portfolio::class, function (Faker $faker) {
    return [
        'description' => $faker->paragraph(2),
        'image_url' => 'https://via.placeholder.com/350',
        'twitter_user_name' => 'twitter'
    ];
});
