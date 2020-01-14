<?php

namespace BrainGames\core;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function processingGame($game_rule, $makingGameData)
{
    line('Welcome to the Brain Game!');
    line($gameRule);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    $count = 0;
    do {
        [$gameQuestion, $gameCorrectAnswer] = $makingGameData();
        line("Question: %s", $gameQuestion);
        $userAnswer = prompt('Your answer');
        if ($userAnswer === $gameCorrectAnswer) {
            line("Correct!");
            $count++;
        } else {
            line("{$userAnswer} is wrong answer ;(. Correct answer was '{$gameCorrectAnswer}'.");
            line("Let's try again, %s!", $name);
            return false;
        }
    } while ($count < ROUNDS_COUNT);
    return line("Congratulations, %s!", $name);
}
