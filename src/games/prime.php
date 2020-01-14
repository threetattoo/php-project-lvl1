<?php

namespace BrainGames\games\prime;

use function BrainGames\core\processingGame;

const GAME_RULE = 'Answer "yes" if given number is prime. Otherwise answer "no".';

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
    $makingGameData = function () {
        $gameQuestion = mt_rand(1, 100);
        if (isPrime($gameQuestion)) {
            $gameCorrectAnswer = "yes";
        } else {
            $gameCorrectAnswer = "no";
        }
        return [$gameQuestion, $gameCorrectAnswer];
    };
    processingGame(GAME_RULE, $makingGameData);
}
