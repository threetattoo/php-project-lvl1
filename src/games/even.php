<?php

namespace Brain\Games\Even;

use function BrainGames\Core\gameProcessing;

function run()
{
    $gameRule = 'Answer "yes" if the number is even, otherwise answer "no".';
    $gameDataMaking = function () {
        $randNum = mt_rand(1, 100);
        if ($randNum % 2 === 0) {
            $gameCorrectAnswer = 'yes';
        } else {
            $gameCorrectAnswer = 'no';
        }
        $gameQuestion = (string) $randNum;
        return [$gameQuestion, $gameCorrectAnswer];
    };
    gameProcessing($gameRule, $gameDataMaking);
}
