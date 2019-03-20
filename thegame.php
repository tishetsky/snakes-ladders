<?php

require __DIR__.'/vendor/autoload.php';

$diceMaxValue = $argv[1] ?? 6;

$gameTargetValue = $argv[2] ?? 100;

$outputFormat = $argv[3] ?? null;

$dice = new \App\Dice($diceMaxValue);

(new \App\Game())
    ->setDice($dice)
    ->setTargetPosition($gameTargetValue)
    ->setOutputFormat($outputFormat)
    ->play();
