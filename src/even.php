<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function numParity($num)
{
    return $num % 2 === 0;
}

function run()
{
    $count = 0;
    $correctAnswersCount = 3;
    line('Welcome to Brain Games!');
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    do {
        $randNum = mt_rand(1, 100);
        line("Question: %s", $randNum);
        $answer = prompt('Your answer: ');
        $checkParity = (numParity($randNum)) ? 'yes' : 'no';
        if ($answer === $checkParity) {
            line("Correct!");
            $count++;
        } else {
            line("{$answer} is wrong answer ;(. Correct answer was '$checkParity'.");
        }
    } while ($count < $correctAnswersCount);
    line("Congratulations, %s!", $name);
}
