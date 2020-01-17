<?php

namespace BrainGames\games\progression;

use function BrainGames\core\runGameProcess;

const GAME_RULE = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;
const MIN_STEP_VALUE = 1;
const MAX_STEP_VALUE = 10;

function genProgression($progressionStep, $progressionLength)
{
    $progressionEnd = $progressionStep * $progressionLength;
    $progression = range($progressionStep, $progressionEnd, $progressionStep);
    return $progression;
}

function run()
{
    $makeGameData = function () {
        $progressionStep = mt_rand(MIN_STEP_VALUE, MAX_STEP_VALUE);
        $progression = genProgression($progressionStep, PROGRESSION_LENGTH);
        $randIndex = mt_rand(0, PROGRESSION_LENGTH - 1);
        $gameCorrectAnswer = (string) $progression[$randIndex];
        $replacement = '..';
        $progression[$randIndex] = $replacement;
        $gameQuestion = implode(' ', $progression);
        return [$gameQuestion, $gameCorrectAnswer];
    };
    runGameProcess(GAME_RULE, $makeGameData);
}
