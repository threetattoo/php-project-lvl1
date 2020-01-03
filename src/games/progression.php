<?php

namespace BrainGames\Progression;

use function cli\line;
use function cli\prompt;

function progressionGen()
{
    $arrayStep = rand(1, 10);
    $arrayEnd = $arrayStep * 10;
    $progression = range($arrayStep, $arrayEnd, $arrayStep);
    return $progression;
}

function run()
{
    $count = 0;
    $correctAnswersCount = 3;
    line('Welcome to Brain Games!');
    line('What number is missing in the progression?');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    do {
        $progression = progressionGen();
        $progressionLength = count($progression) - 1;
        $randIndex = mt_rand(0, $progressionLength);
        $hiddenDigit = $progression[$randIndex];
        $replacement = '..';
        $progression[$randIndex] = $replacement;
        $hiddenDigitProgression = implode(' ', $progression);
        line("Question: %s", $hiddenDigitProgression);
        $answer = prompt('Your answer: ');
        if ($answer === (string) $hiddenDigit) {
            line("Correct!");
            $count++;
        } else {
            line("{$answer} is wrong answer ;(. Correct answer was '$hiddenDigit'.");
            line("Let's try again, %s!", $name);
            break;
        }
    } while ($count < $correctAnswersCount);
    if ($count == $correctAnswersCount) {
        line("Congratulations, %s!", $name);
    }
}
