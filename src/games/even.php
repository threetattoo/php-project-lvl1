<?php

namespace BrainGames\games\even;

use function BrainGames\core\processingGame;

const GAME_RULE = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven($num)
{
    if ($num % 2 === 0) {
        $result = 'yes';
    } else {
        $result = 'no';
    }
    return $result;
}

function run()
{
    $makingGameData = function () {
        $randNum = mt_rand(1, 100);
        $gameCorrectAnswer = isEven($randNum);
        $gameQuestion = (string) $randNum;
        return [$gameQuestion, $gameCorrectAnswer];
    };
    processingGame(GAME_RULE, $makingGameData);
}
