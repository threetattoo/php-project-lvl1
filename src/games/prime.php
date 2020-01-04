<?php

namespace BrainGames\Prime;

use function cli\line;
use function cli\prompt;

function isPrime($num)
{
    if ($num == 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($num); $i++) {
        if (!($num % $i)) {
            return false;
        }
    }
    return true;
}

function run()
{
    $count = 0;
    $correctAnswersCount = 3;
    line('Welcome to Brain Games!');
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    do {
        $randNum = mt_rand(1, 100);
        if (isprime($randNum)) {
            $correctAnswer = "yes";
        } else {
            $correctAnswer = "no";
        }
        line("Question: %s", $randNum);
        $answer = prompt('Your answer: ');
        if ($answer === (string) $correctAnswer) {
            line("Correct!");
            $count++;
        } else {
            line("{$answer} is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, %s!", $name);
            break;
        }
    } while ($count < $correctAnswersCount);
    if ($count == $correctAnswersCount) {
        line("Congratulations, %s!", $name);
    }
}
