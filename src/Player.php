<?php


abstract class Player
{
    public function __construct(protected $name, protected $language) {
    }

    abstract public function greet($name, $language);
    abstract public function challengeOpponent($rounds);

    /**
     * Translates the word 'hello' based on the ISO 639-1 language code
     */
    public function translateHello($language_code) : string|null {
        $response = @file_get_contents('https://fourtonfish.com/hellosalut/?lang='.$language_code);
        return json_decode($response)->hello ?? 'hello';
    }

    public static function displayMessage($message, $pause){
        echo "$message\n";
        sleep($pause);
    }

    public static function getUserInput($input): bool|string
    {
        return readline($input."\n");
    }
}
