<?php

namespace BrainGames\games\progression;

use function BrainGames\core\processingGame;

const GAME_RULE = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;

function genProgression()
{
    $progressionStep = rand(1, 10);
    $progressionEnd = $progressionStep * PROGRESSION_LENGTH;
    $progression = range($progressionStep, $progressionEnd, $progressionStep);
    return $progression;
}

function run()
{
    $makingGameData = function () {
        $progression = genProgression();
        $randIndex = mt_rand(0, PROGRESSION_LENGTH);
        $hiddenDigit = $progression[$randIndex];
        $replacement = '..';
        $progression[$randIndex] = $replacement;
        $gameQuestion = implode(' ', $progression);
        $gameCorrectAnswer = (string) $hiddenDigit;
        return [$gameQuestion, $gameCorrectAnswer];
    };
    processingGame(GAME_RULE, $makingGameData);
}
