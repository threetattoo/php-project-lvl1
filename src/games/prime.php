<?php

namespace Brain\Games\Prime;

use function BrainGames\Core\gameProcessing;

function isPrime($num)
{
    if ($num == 1) {
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
    $gameRule = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $gameDataMaking = function () {
        $randNum = mt_rand(1, 100);
        if (isPrime($randNum)) {
            $gameCorrectAnswer = "yes";
        } else {
            $gameCorrectAnswer = "no";
        }
        $gameQuestion = (string) $randNum;
        return [$gameQuestion, $gameCorrectAnswer];
    };
    gameProcessing($gameRule, $gameDataMaking);
}
