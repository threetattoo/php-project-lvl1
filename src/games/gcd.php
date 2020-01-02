<?php

namespace BrainGames\Gcd;

use function cli\line;
use function cli\prompt;

function gcd($n, $m)
{
    if ($m > 0) {
        return gcd($m, $n % $m);
    } else {
        return abs($n);
    }
}

function run()
{
    $correctAnswersCount = 3;
    line('Welcome to Brain Games!');
    line('Find the greatest common divisor of given numbers.');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    do {
        $randNumOne = mt_rand(1, 50);
        $randNumTwo = mt_rand(1, 50);
        $result = gcd($randNumOne, $randNumTwo);
        line("Question: %s %s", $randNumOne, $randNumTwo);
        $answer = prompt('Your answer: ');
        if ($answer === (string) $result) {
            line("Correct!");
            $count++;
        } else {
            line("{$answer} is wrong answer ;(. Correct answer was '$result'.");
        }
    } while ($count < $correctAnswersCount);
}
