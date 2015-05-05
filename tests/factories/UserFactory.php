<?php

/** @var Closure $factory */
$factory('App\User',
         [
             'first_name' => $faker->firstName,
             'last_name'  => $faker->lastName,
             'email'      => $faker->unique()->email,
             'password'   => bcrypt('secret'),
             'created_at' => $faker->dateTimeThisDecade
         ]);