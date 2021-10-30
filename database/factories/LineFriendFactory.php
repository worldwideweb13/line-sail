<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\LineFriend;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(LineFriend::class, function (Faker $faker) {
    return [
        'user_id' => 3,
        'display_name' => $faker->name(),
        'created_at' => Carbon::today(),
    ];
});
