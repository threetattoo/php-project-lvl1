<?php

namespace BrainGames\games\calc;

use function BrainGames\core\processingGame;

const GAME_RULE = 'What is the result of the expression?';

function run()
{
    $makingGameData = function () {
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
                null;
        }
        $gameQuestion = "$leftOperand $currentOperator $rightOperand";
        $gameCorrectAnswer = (string) $result;
        return [$gameQuestion, $gameCorrectAnswer];
    };
    processingGame(GAME_RULE, $makingGameData);
}
