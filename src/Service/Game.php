<?php


namespace App\Service;


use App\Entity\Card;
use App\Entity\Deck;

class Game
{

    /** @var Deck */
    private $deck;
    /** @var string[] */
    private $colourSort = Deck::COLOURS;
    /** @var string[] */
    private $valueSort = Deck::VALUES;

    /**
     * @return Deck
     */
    public function getDeck(): Deck
    {
        return $this->deck;
    }

    /**
     * @param Deck $deck
     * @return Game
     */
    public function setDeck(Deck $deck): Game
    {
        $this->deck = $deck;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getColourSort(): array
    {
        return $this->colourSort;
    }

    /**
     * @param string[] $colourSort
     * @return Game
     */
    public function setColourSort(array $colourSort): Game
    {
        $this->colourSort = $colourSort;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getValueSort(): array
    {
        return $this->valueSort;
    }

    /**
     * @param string[] $valueSort
     * @return Game
     */
    public function setValueSort(array $valueSort): Game
    {
        $this->valueSort = $valueSort;
        return $this;
    }

    /**
     * @throws \Exception
     */
    public function init()
    {
        $this->deck = new Deck();
        $this->deck->shuffle();
        shuffle($this->colourSort);
        shuffle($this->valueSort);
    }

    /**
     * @param $hand
     * @return mixed
     */
    public function sortHand($hand)
    {
        $sortedHand = $hand;
        usort($sortedHand, function(Card $a, Card $b){
            $aColour = array_search($a->getColour(), $this->colourSort);
            $bColour = array_search($b->getColour(), $this->colourSort);

            if($aColour == $bColour){
                $aValue = array_search($a->getValue(), $this->valueSort);
                $bValue = array_search($b->getValue(), $this->valueSort);

                return $aValue < $bValue ? -1 : 1;
            }

            return $aColour < $bColour ? -1 : 1;
        });

        return $sortedHand;
    }

}