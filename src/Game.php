<?php

require_once 'src/Fighter.php';
require_once 'src/Civilian.php';

class Game
{
    private \Player $player;

    public function getPlayer(): Player
    {
        return $this->player;
    }

    public function addPlayer(\Player $player) : Game
    {
        $this->player = $player;
        return $this;
    }

    /**
     * Starts the game
     */
    public function start() : void
    {
        echo "Welcome!\nWould you like to play as a 1) fighter or 2) civilian?\n"
             ."Fighters can challenge their opponents to a game "
             ."of Rock, Paper, Scissors. Civilians can play hangman.\n";

        while (true){
            $player = readline("Please select a number: ");
            if($player == 1 || $player == 2){
                break;
            }
        }
        $name = readline("Please enter your player's name: ");
        $language = readline("Please specify your player's language by entering a language"
                         ."code (e.g. fr, en, es, de...): ");

        if ($player == 1) {
            $this->addPlayer(new Fighter($name, $language));
        } else {
            $this->addPlayer(new Civilian($name, $language));
        }

        echo "After a long walk, you see somebody in the distance and decide to greet them.\n";
        $this->getPlayer()->greetOpponent();
        echo "They greet you back and you start playing a game.\n";
        $this->getPlayer()->challengeOpponent();
    }
}
