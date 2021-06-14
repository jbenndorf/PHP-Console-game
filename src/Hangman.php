<?php

class Hangman
{
    const WORDS = array(
        'encyclopedia',
        'philosophy',
        'programming',
        'computer',
        'holidays',
        'atlantic',
        'umbrella',
    );

    /*
     * Randomly selects one of the words, inserts each letter
     * into an array, assigns it to a '_' character and updates
     * this as the player guesses the according letters.
     */
    public function playHangman($rounds)
    {
        for ($i = 0; $i < $rounds + 1; $i++) {
            $secret_word = $this->selectRandomWord();

            //Initialises array for the selected word
            $secret_letters = array();
            foreach (str_split($secret_word) as $letter) {
                $secret_letters[$letter] = '_';
            }

            while (true) {
                //Displays the array values to the user
                $display = implode(' ', array_values($secret_letters));
                Player::displayMessage($display,0);
                $guess = Player::getUserInput('Guess a letter: ');

                /*Checks whether the user input matches a letter
                  and updates array values if appropriate*/
                foreach ($secret_letters as $letter => &$key) {
                    if ($guess === $letter) {
                        $key = $letter;
                    }
                }

                if (!str_contains($display, '_')) {
                    Player::displayMessage("Congratulations, you won!\n", 0);
                    break;
                }
            }
        }
    }

    /*
     * @return string
     */
    public function selectRandomWord(): string
    {
        $words = self::WORDS;
        shuffle($words);

        return $words[0];
    }
}
