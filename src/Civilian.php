<?php

require_once 'Player.php';
require_once 'Hangman.php';

class Civilian extends Player
{

    public function __construct(string $name, string $language)
    {
        parent::__construct($name, $language);

        //Output a terminal message to greet the player
        $greeting = $this->greet($name, $language);
        $this->displayMessage($greeting, 1);

        //Play hangman a given number of rounds
        $rounds = $this->getUserInput('How many rounds of hangman would you like to play?');
        $this->challengeOpponent($rounds);
    }

    /*
     * A civilian can challenge their opponent to a game of hangman.
     */
    public function challengeOpponent($rounds)
    {
        $game = new Hangman();
        $game->playHangman($rounds);
    }

    public function greet($name, $language): string
    {
        $international_hello = $this->translateHello($language);
        return sprintf("%s, %s! How is it going?", $international_hello, $name);
    }
}
