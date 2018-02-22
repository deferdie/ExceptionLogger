<?php

use Faker\Generator as Faker;

$factory->define(\App\Project::class, function (Faker $faker) {
    return [
    	'user_id' => function(){
    		return factory('App\User')->create()->id;
    	},
        'name' => $faker->name,
        'SCM'  => 'https://github.com/deferdie/ExceptionLogger',
        'colour'  => '#ffdd00',
        'status'  => 'active',
    ];
});
