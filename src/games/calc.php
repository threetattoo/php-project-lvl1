<?php

namespace Brain\Games\Calc;

use function BrainGames\Core\gameProcessing;

function run()
{
    $gameRule = 'What is the result of the expression?';
    $gameDataMaking = function () {
        $operators = array('+', '-', '*');
        $randIndex = array_rand($operators, 1);
        $currentOperator = $operators[$randIndex];
        $leftOperand = mt_rand(0, 50);
        $rightOperand = mt_rand(0, 50);
        switch ($currentOperator) {
            case '+':
                $result = $leftOperand + $rightOperand;
                break;
            case '-':
                $result = $leftOperand - $rightOperand;
                break;
            case '*':
                $result = $leftOperand * $rightOperand;
                break;
            default:
                line('It is not operator!');
        }
        $gameQuestion = "$leftOperand $currentOperator $rightOperand";
        $gameCorrectAnswer = (string) $result;
        return [$gameQuestion, $gameCorrectAnswer];
    };
    gameProcessing($gameRule, $gameDataMaking);
}
