<?php

namespace BrainGames\games\prime;

use function BrainGames\core\runGameProcess;

const GAME_RULE = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MIN_RAND_VALUE = 1;
const MAX_RAND_VALUE = 100;

function isPrime($num)
{
    if ($num <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($num); $i++) {
        if (!($num % $i)) {
            return false;
        }
    }
    return true;
}

function run()
{
    $makeGameData = function () {
        $gameQuestion = mt_rand(MIN_RAND_VALUE, MAX_RAND_VALUE);
        $gameCorrectAnswer = isPrime($gameQuestion) ? "yes" : "no";
        return [$gameQuestion, $gameCorrectAnswer];
    };
    runGameProcess(GAME_RULE, $makeGameData);
}
