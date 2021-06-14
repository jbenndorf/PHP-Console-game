<?php

require_once 'Player.php';
require_once 'RockPapersScissors.php';

class Fighter extends Player
{
    public function __construct(string $name, string $language)
    {
        parent::__construct($name, $language);

        //Output a terminal message to greet the player
        $greeting = $this->greet($name, $language);
        $this->displayMessage($greeting, 1);

        //Play Rock, Paper, Scissors a given number of rounds
        $rounds = $this->getUserInput('How many rounds of Rock, Paper, Scissors would you like to play?');
        $this->challengeOpponent($rounds);
    }

    public function challengeOpponent($rounds)
    {
        $game = new RockPapersScissors();
        $game->playRockPaperScissors($rounds);
    }

    public function greet($name, $language): string
    {
        $international_hello = $this->translateHello($language);
        return sprintf("%s, %s! It is nice meeting you.", $international_hello, $name);
    }
}
