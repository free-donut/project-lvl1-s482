<?php
namespace BrainGames\Engine;

use function \cli\line;
use function \cli\prompt;

const RIGHT_ANSWERS_COUNT = 3;

function run($description, $getData)
{
    line('Welcome to the Brain Game!');
    line($description);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    for ($i = 0; $i < RIGHT_ANSWERS_COUNT; $i++) {
        [$question, $correctAnswer] = $getData();
        line('Question: %s', $question);
        $answer = prompt('Your answer');
        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'', $answer, $correctAnswer);
            line("Let's try again, %s", $name);
            return;
        }
    }
    line('Congratulations, %s', $name);
}
