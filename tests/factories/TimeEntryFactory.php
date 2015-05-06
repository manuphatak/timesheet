<?php //tests/factories/TimeEntryFactory.php

/** @var Closure $factory */
$factory('App\TimeEntry',
         [
             'user_id'    => 'factory:App\User',
             'start_time' => $faker->dateTimeBetween($startDate = '-2 hours',
                                                     $endDate = 'now'),
             'end_time'   => $faker->dateTimeBetween($startDate = 'now',
                                                     $endDate = '1 hours'),
             'comment'    => $faker->optional($weight = 0.5)->sentence()
         ]);