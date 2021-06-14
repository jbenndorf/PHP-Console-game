<?php

class RockPapersScissors
{
    const ROCK = 1;
    const PAPER = 2;
    const SCISSORS = 3;
    const MATCHES = array(
        self::ROCK => array(self::SCISSORS),
        self::PAPER => array(self::ROCK),
        self::SCISSORS => array(self::PAPER),
    );

    /*
     * Plays Rock, Paper, Scissors for a given number of rounds.
     *
     */
    public function playRockPaperScissors($rounds)
    {
        for ($i = 0; $i < $rounds + 1; $i++) {
            $player = $this->getPlayerChoice();
            $player_constant = $this->getConstantName($player);

            $opponent = $this->getOpponentChoice();
            $opponent_constant = $this->getConstantName($opponent);

            $result = $this->getResult($player, $opponent);

            if ($result == 'Win') {
                Player::displayMessage(sprintf("You won! %s beats %s.", $player_constant, $opponent_constant),0);
            } elseif ($result == 'Draw') {
                Player::displayMessage(sprintf("There is a draw between %s and %s.", $player_constant, $opponent_constant),0);
            } else {
                Player::displayMessage(sprintf("You have lost. %s does not beat %s.", $player_constant, $opponent_constant),0);
            }
        }
    }

    /*
     * Retrieving the constant names using the reflection API.
     *
     * @param $value
     * @return string
     */
    public static function getConstantName($value): string
    {
        $class = new ReflectionClass(static::class);
        $constants = @array_flip($class->getConstants());

        return $constants[$value];
    }

    /**
     * @return int
     */
    public function getPlayerChoice(): int
    {
        while (true) {
            $choice = readline("Please choose between a NUMBER for (1)Rock, (2)Paper and (3)Scissors: ");
            if (array_key_exists($choice, self::MATCHES)) {
                return $choice;
            }
        }
    }

    /**
     * @return int
     */
    public function getOpponentChoice(): int
    {
        $choices = array_keys(self::MATCHES);
        shuffle($choices);

        return $choices[0];
    }

    /*
     * Determines the game result based on the player's
     * and opponent's choices.
     *
     * @param $player
     * @param $opponent
     * @return string
     */
    public function getResult($player, $opponent): string
    {
        if (in_array($opponent, self::MATCHES[$player])) {
            return 'Win';
        } elseif ($player == $opponent) {
            return 'Draw';
        } else {
            return 'Loose';
        }
    }
}
