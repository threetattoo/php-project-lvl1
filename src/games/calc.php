<?php

namespace BrainGames\Calc;

use function cli\line;
use function cli\prompt;

function run()
{
    $operators = array('+', '-', '*');
    $count = 0;
    $correctAnswersCount = 3;
    line('Welcome to Brain Games!');
    line('What is the result of the expression?');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    do {
        $randIndex = array_rand($operators, 1);
        $currentOperator = $operators[$randIndex];
        $leftOperand = mt_rand(0, 50);
        $rightOperand = mt_rand(0, 50);
        switch ($currentOperator) {
            case '+':
                $currentTask = $leftOperand . '+' . $rightOperand;
                $taskResult = $leftOperand + $rightOperand;
                break;
            case '-':
                $currentTask = $leftOperand . '-' . $rightOperand;
                $taskResult = $leftOperand - $rightOperand;
                break;
            case '*':
                $currentTask = $leftOperand . '*' . $rightOperand;
                $taskResult = $leftOperand * $rightOperand;
                break;
            default:
                line('It is not operator!');
        }
        $currentTaskResult = (string) $taskResult;
        line("Question: {$currentTask}");
        $answer = prompt('Your answer: ');
        if ($answer === $currentTaskResult) {
            line("Correct!");
            $count++;
        } else {
            line("{$answer} is wrong answer ;(. Correct answer was '{$currentTaskResult}'.");
            line("Let's try again, %s!", $name);
            break;
        }
    } while ($count < $correctAnswersCount);
    if ($count == $correctAnswersCount) {
        line("Congratulations, %s!", $name);
    }
}
