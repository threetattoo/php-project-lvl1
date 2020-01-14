<?php

namespace BrainGames\games\gcd;

use function BrainGames\core\processingGame;

const GAME_RULE = 'Find the greatest common divisor of given numbers.';

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
    $makingGameData = function () {
        $randNumOne = mt_rand(1, 50);
        $randNumTwo = mt_rand(1, 50);
        $result = gcd($randNumOne, $randNumTwo);
        $gameQuestion = "$randNumOne $randNumTwo";
        $gameCorrectAnswer = (string) $result;
        return [$gameQuestion, $gameCorrectAnswer];
    };
    processingGame(GAME_RULE, $makingGameData);
}
