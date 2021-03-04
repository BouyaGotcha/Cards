<?php


namespace App\Entity;


class Card
{

    private $colour;
    private $value;

    /**
     * Card constructor.
     * @param $colour
     * @param $value
     * @throws \Exception
     */
    public function __construct($colour, $value)
    {
        if(!in_array($colour, Deck::COLOURS) || !in_array($value, Deck::VALUES)){
            throw new \Exception("Invalid colour or value");
        }
        $this->colour = $colour;
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getColour()
    {
        return $this->colour;
    }

    /**
     * @param mixed $colour
     * @return Card
     */
    public function setColour($colour)
    {
        $this->colour = $colour;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return Card
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

}
