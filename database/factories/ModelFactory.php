<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
$faker = new Faker\Factory();
$factory->define(App\User::class, function ($faker) {
    return [
        'name'     => $faker->name,
        'email'    => $faker->email,
        'password' => Hash::make('password'),
//        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Word::class, function ($faker) {
    return [
        'word'          => $faker->word,
        'pronunciation' => $faker->word,
        'hits'          => $faker->numberBetween($min = 0, $max = 9000),
        'created_by'    => $faker->numberBetween($min = 1, $max = 50),
        'letter_id'     => $faker->numberBetween($min = 1, $max = 26),
    ];
});
$factory->define(App\Definition::class, function ($faker) {
    return [
        'word_id'            => $faker->numberBetween($min = 1, $max = 200),
        'definition'         => $faker->sentence($nbWords = 8),
        'part_of_speech'     => $faker->numberBetween($min = 1, $max = 10),
        'english'            => $faker->word,
        'english_definition' => $faker->sentence($nbWords = 8),
        'image'              => $faker->imageUrl($width = 640, $height = 480),
    ];
});
