<?php

/** @var Closure $factory */
$factory('App\TimeEntry',
         [
             'user_id' => 'factory:App\User',
             'start_time' => $faker->dateTimeBetween($startDate = '-5 hours',
                                                     $endDate = 'now'),
             'end_time' => $faker->dateTimeBetween($startDate = 'now',
                                                   $endDate = '5 hours'),
             'comment' => $faker->sentence()
         ]);