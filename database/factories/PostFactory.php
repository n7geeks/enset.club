<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Post;
use Faker\Generator as Faker;
use RomegaDigital\Multitenancy\Models\Tenant;

$factory->define(Post::class, function (Faker $faker) {
    return [
        "tenant_id" => random_int(1, Tenant::orderBy("id", "desc")->first()->id),
        "title" => $faker->text(40),
        "body" => $faker->text(500),
    ];
});
