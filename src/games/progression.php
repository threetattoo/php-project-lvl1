<?php

namespace Brain\Games\Progression;

use function BrainGames\Core\gameProcessing;

function progressionGen()
{
    $arrayStep = rand(1, 10);
    $arrayEnd = $arrayStep * 10;
    $progression = range($arrayStep, $arrayEnd, $arrayStep);
    return $progression;
}

function run()
{
    $gameRule = 'What number is missing in the progression?';
    $gameDataMaking = function () {
        $progression = progressionGen();
        $progressionLength = count($progression) - 1;
        $randIndex = mt_rand(0, $progressionLength);
        $hiddenDigit = $progression[$randIndex];
        $replacement = '..';
        $progression[$randIndex] = $replacement;
        $gameQuestion = implode(' ', $progression);
        $gameCorrectAnswer = (string) $hiddenDigit;
        return [$gameQuestion, $gameCorrectAnswer];
    };
    gameProcessing($gameRule, $gameDataMaking);
}
