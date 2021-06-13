<?php

require_once 'Traits/RockPapersScissors.php';
require_once 'Player.php';
require_once 'Person.php';

class Fighter extends Person implements Player
{
    use RockPapersScissors;

    public function __construct(string $name, string $language)
    {
        $this->name = $name;
        $this->language = $language;
    }

    public function greetOpponent()
    {
        $language = $this->getLanguage();
        $name = $this->getName();
        $greeting = $this->translateHello($language);

        echo sprintf("%s, I am %s! I can't wait to beat you at a game.\n", $greeting, $name);
    }

    /*
     * A fighter challenges their opponent with a game of Rock, Paper, Scissors.
     */
    public function challengeOpponent()
    {
        $this->playRockPapersScissors();
    }

}
