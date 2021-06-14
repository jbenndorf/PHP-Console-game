<?php

require_once 'src/Fighter.php';
require_once 'src/Civilian.php';

class Game
{
    private string $name;
    private string $language;
    private Player $player;

    public function __construct(){
        Player::displayMessage('Welcome!', 1);
    }

    public function saveDetails() : void
    {
        $this->name = Player::getUserInput("Please enter your name: ");
        $this->language = Player::getUserInput(
            "Please specify your language by entering a language"
            ."code (e.g. fr, en, es, de...): ");
    }

    public function startGame() : void
    {
        $name = $this->getName();
        $language = $this->getLanguage();

        $explanation = "Would you like to play as a (1) fighter or (2) civilian?\n"
             ."Fighters can challenge their opponents to a game "
             ."of Rock, Paper, Scissors. Civilians can play hangman.";
        Player::displayMessage($explanation, 1);

        //Allows user to choose the type of player
        while (true){
            $player = Player::getUserInput("Please select a number: ");
            if($player == 1 || $player == 2){
                break;
            }
        }
        //Instantiates a Fighter or Civilian object
        if ($player == 1) {
            $this->setPlayer(new Fighter($name, $language));
        } else {
            $this->setPlayer(new Civilian($name, $language));
        }
    }

    public function exit() : void
    {
        $name = $this->getName();
        Player::displayMessage(sprintf("See you soon, %s", $name), 0);
    }

    public function getPlayer(): Player
    {
        return $this->player;
    }

    public function setPlayer(Player $player) : Game
    {
        $this->player = $player;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

}
