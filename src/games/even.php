<?php

namespace BrainGames\games\even;

use function BrainGames\core\runGameProcess;

const GAME_RULE = 'Answer "yes" if the number is even, otherwise answer "no".';
const MIN_RAND_VALUE = 1;
const MAX_RAND_VALUE = 100;

function isEven($num)
{
    return ($num % 2 === 0) ? true : false;
}

function run()
{
    $makeGameData = function () {
        $gameQuestion = mt_rand(MIN_RAND_VALUE, MAX_RAND_VALUE);
        $gameCorrectAnswer = isEven($gameQuestion) ? "yes" : "no";
        return [$gameQuestion, $gameCorrectAnswer];
    };
    runGameProcess(GAME_RULE, $makeGameData);
}
