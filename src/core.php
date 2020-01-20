<?php

namespace BrainGames\core;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function runGameProcess($game_rule, $makeGameData)
{
    line('Welcome to the Brain Game!');
    line($gameRule);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    for ($count = 0; $count < ROUNDS_COUNT; $count++) {
        [$gameQuestion, $gameCorrectAnswer] = $makeGameData();
        line("Question: %s", $gameQuestion);
        $userAnswer = prompt('Your answer');
        if ($userAnswer === $gameCorrectAnswer) {
            line("Correct!");
        } else {
            line("{$userAnswer} is wrong answer ;(. Correct answer was '{$gameCorrectAnswer}'.");
            line("Let's try again, %s!", $name);
        }
    }
    line("Congratulations, %s!", $name);
}
