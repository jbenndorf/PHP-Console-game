<?php

require_once 'Traits/Hangman.php';
require_once 'Player.php';
require_once 'Person.php';

class Civilian extends Person implements Player
{
    use Hangman;

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

        echo sprintf("%s, I am %s! It is very nice meeting you...\n", $greeting, $name);
    }

    /*
     * A civilian challenges their opponent to a game of hangman.
     */
    public function challengeOpponent()
    {
        $this->playHangman();
    }
}
