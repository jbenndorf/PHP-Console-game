<?php

trait RockPapersScissors
{
    public function playRockPapersScissors(){
        $options = array('Rock', 'Paper', 'Scissors');

        //initialise the multi-dimensional array
        $matrix = array();
        foreach($options as $option){
            $matrix[$option] = array(
                'Rock' => 0,
                'Paper' => 0,
                'Scissors' => 0,
            );
        }

        echo "Let's play Rock, Paper, Scissors!\n";

        $previous_choice = '';

        for ($round = 0; $round < 10; $round++) {
            //Player's turn
            $player_choice = $this->getPlayerChoice($options);
            echo sprintf("You picked %s\n", $player_choice);

            //Opponent's turn
            $computer_choice = $this->getOpponentChoice($options, $matrix, $previous_choice);
            echo sprintf("Your opponent picked %s\n", $computer_choice);

            if(!empty($previous_choice)){
                $matrix[$previous_choice][$player_choice]++;
            }

            $previous_choice = $player_choice;
        }
    }

    public function getPlayerChoice($options) : string {
        echo 'Please choose between the following options: ';
        foreach($options as $option){
            echo sprintf('%s ', $option);
        }
        while (true) {
            $choice = readline("\nEnter option: ");
            if (in_array($choice, $options)) {
                return $choice;
            }
        }
    }

    /*
     * Looks at the player's previous move and estimates which move the
     * player is most likely to make next, based on a state transition
     * probability matrix.
     *
     */
    public function getOpponentChoice($options, $matrix, $previousChoice): int|array|string
    {
        if (!empty($previousChoice)){
            return array_search(max($matrix[$previousChoice]), $matrix[$previousChoice]);
        }
        shuffle($options);
        return $options[0];
    }
}
