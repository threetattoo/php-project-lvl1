<?php

namespace BrainGames\games\gcd;

use function BrainGames\core\runGameProcess;

const GAME_RULE = 'Find the greatest common divisor of given numbers.';
const MIN_RAND_VALUE = 1;
const MAX_RAND_VALUE = 50;

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
    $makeGameData = function () {
        $randNumOne = mt_rand(MIN_RAND_VALUE, MAX_RAND_VALUE);
        $randNumTwo = mt_rand(MIN_RAND_VALUE, MAX_RAND_VALUE);
        $result = gcd($randNumOne, $randNumTwo);
        $gameQuestion = "$randNumOne $randNumTwo";
        $gameCorrectAnswer = (string) $result;
        return [$gameQuestion, $gameCorrectAnswer];
    };
    runGameProcess(GAME_RULE, $makeGameData);
}
