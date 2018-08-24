<?php

use Faker\Generator as Faker;
use App\User;
use Modules\SalleReservation\Entities\Room;

$userNum = User::get()->count();
$roomNum = Room::get()->count();

$factory->define(Model::class, function (Faker $faker) {
    return [
        'users_id' => $faker->numberBetween(1,$usersNum),
        'rooms_id' => $faker->numberBetween(1,$roomNum),
        'description' => $faker->sentence(),
    ];
});
