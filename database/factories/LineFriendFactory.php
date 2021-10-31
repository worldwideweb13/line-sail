<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\LineFriend;
use Faker\Generator as Faker;
use Carbon\Carbon;
use Illuminate\Support\Str;

$factory->define(LineFriend::class, function (Faker $faker) {
    $now = Carbon::today();
    return [
        'user_id' => 3,
        'friend_id' => Str::random(33),
        'display_name' => $faker->name(),
        'created_at' => $now,
        'updated_at' => $now,
    ];
});
