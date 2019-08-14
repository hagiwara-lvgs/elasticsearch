<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->text,
        'tags' => collect(['php', 'ruby', 'java', 'javascript', 'bash'])->random(2)->all()
    ];
});
