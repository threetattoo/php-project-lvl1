<?php

namespace BrainGames\games\calc;

use function BrainGames\core\runGameProcess;

const GAME_RULE = 'What is the result of the expression?';
const MIN_OPERAND_VALUE = 0;
const MAX_OPERAND_VALUE = 50;

function run()
{
    $makeGameData = function () {
        $operators = array('+', '-', '*');
        $randIndex = array_rand($operators, 1);
        $currentOperator = $operators[$randIndex];
        $leftOperand = mt_rand(MIN_OPERAND_VALUE, MAX_OPERAND_VALUE);
        $rightOperand = mt_rand(MIN_OPERAND_VALUE, MAX_OPERAND_VALUE);
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
    runGameProcess(GAME_RULE, $makeGameData);
}
