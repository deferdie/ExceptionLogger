<?php

use Faker\Generator as Faker;

$factory->define(App\ProjectException::class, function (Faker $faker) {
    return [
        'project_id' => function()
        {
        	return factory('App\Project')->create()->id;
        },
        'file' => '/file/path',
        'message' => $faker->paragraph(2),
        'description' => $faker->paragraph(2),
        'browser' => 'chrome',
        'os' => 'osx',
        'request_url' => '/request_url',
        'stack_trace' => "{json:'blob'}",
        'enviroment' => 'production',
        'level' => 'error',
        'line_number' => 200,
        'status_code' => 404,
        'code' => 0,
        'headers' => 'some headers',
    ];
});
