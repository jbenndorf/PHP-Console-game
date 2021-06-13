<?php

/*
 * Every person has a name and a language, in which they can say 'hello'.
 */
abstract class Person
{
    protected string $name;
    protected string $language;

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Translates the word 'hello' based on the ISO 639-1 language code
     */
    public function translateHello($language_code) : string|null {
        $response = @file_get_contents('https://fourtonfish.com/hellosalut/?lang='.$language_code);
        return json_decode($response)->hello ?? 'hello';
    }
}
