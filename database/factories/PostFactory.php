<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'body' => $faker->body,
        'church_id' => $faker->church_id,
        'image_id' => $faker->image_id,
    ];
});
