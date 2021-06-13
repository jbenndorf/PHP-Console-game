<?php

/**
 *
 * Trait RhymingHangman
 */
trait Hangman
{
    public function playHangman(){
        $words = ['fish', 'door', 'car', 'floor', 'china', 'spark', 'dark', 'tube', 'boy', 'girl', 'nose', 'bar', 'fool', 'house'];

        shuffle($words);
        $word = $words[0];
        $letters = str_split($word);

        $displayedLetters = [];

        foreach ($letters as $letter) {
            $displayedLetters[] = '_';
        }

        $displayedWord = implode(' ', $displayedLetters);

        echo "\n $displayedWord \n\n";


        while (true) {
            if (!str_contains($displayedWord, '_')){
                echo "Congratulations, you won!\n";
                break;
            }

            $guess = readline('Guess a letter: ');

            for ($i = 0; $i < count($letters); $i++) {

                if ($guess === $letters[$i]){
                    $displayedLetters[$i] = $guess;
                }
            }

            $displayedWord = implode(' ', $displayedLetters);

            echo "\n $displayedWord \n\n";

        }
    }
}
