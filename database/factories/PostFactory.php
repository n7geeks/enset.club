<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Club;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        "tenant_id" => random_int(1, Club::query()->orderBy("id", "desc")->first()->id),
        "title" => $faker->text(40),
        "body" => $faker->text(500),
    ];
});
