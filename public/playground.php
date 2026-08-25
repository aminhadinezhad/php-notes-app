<?php

use Illuminate\Support\Collection;

require __DIR__ . '/../vendor/autoload.php';

$users = collect([
    ['name' => 'Ali',   'score' => 18],
    ['name' => 'Sara',  'score' => 9],
    ['name' => 'Reza',  'score' => 14],
    ['name' => 'Mina',  'score' => 7],
]);

// 1) filter: فقط قبولی‌ها (نمره >= 10)
$passedUsers = $users->filter(fn($user) => $user['score'] >= 10);

// 2) map: ساختن یک خروجی جدید فقط با اسم‌ها
$passedNames = $passedUsers->map(fn($user) => $user['name']);

// 3) reduce: جمع نمره قبولی‌ها
$totalPassedScore = $passedUsers->reduce(
    fn($carry, $user) => $carry + $user['score'],
    0
);

echo "passed users:\n";
print_r($passedUsers->all());

echo "\npassed names:\n";
print_r($passedNames->all());

echo "\ntotal passed score: {$totalPassedScore}\n";
