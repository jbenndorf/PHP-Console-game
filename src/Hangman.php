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
            $secret_letters = str_split($secret_word);
            $displayed_chars = array_fill(0, strlen($secret_word), '_');

            while (true) {
                //Displays the array values to the user
                $display = implode(' ', $displayed_chars);
                Player::displayMessage($display,0);

                if (!str_contains($display, '_')) {
                    Player::displayMessage("Congratulations, you won!\n", 0);
                    break;
                }

                $guess = Player::getUserInput('Guess a letter: ');

                /*Checks whether the user input matches a letter
                  and updates array values if appropriate*/
                foreach ($secret_letters as $index => $value) {
                    if ($guess === $value) {
                        $displayed_chars[$index] = $value;
                    }
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
