<?php

namespace Brain\Games\Gcd;

use function BrainGames\Core\gameProcessing;

function gcd($n, $m)
{
    if ($m > 0) {
        return gcd($m, $n % $m);
    } else {
        return abs($n);
    }
}

function run()
{
    $gameRule = 'Find the greatest common divisor of given numbers.';
    $gameDataMaking = function () {
        $randNumOne = mt_rand(1, 50);
        $randNumTwo = mt_rand(1, 50);
        $result = gcd($randNumOne, $randNumTwo);
        $gameQuestion = "$randNumOne $randNumTwo";
        $gameCorrectAnswer = (string) $result;
        return [$gameQuestion, $gameCorrectAnswer];
    };
    gameProcessing($gameRule, $gameDataMaking);
}
