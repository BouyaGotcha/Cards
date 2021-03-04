<?php


namespace App\Entity;


class Deck
{

    const COLOUR_CLUBS = "clubs";
    const COLOUR_DIAMONDS = "diamonds";
    const COLOUR_HEARTS = "hearts";
    const COLOUR_SPADES = "spades";

    const VALUE_ACE = "ace";
    const VALUE_TWO = "two";
    const VALUE_THREE = "three";
    const VALUE_FOUR = "four";
    const VALUE_FIVE = "five";
    const VALUE_SIX = "six";
    const VALUE_SEVEN = "seven";
    const VALUE_EIGHT = "eight";
    const VALUE_NINE = "nine";
    const VALUE_TEN = "ten";
    const VALUE_JACK = "jack";
    const VALUE_QUEEN = "queen";
    const VALUE_KING = "king";

    const COLOURS = array(
        self::COLOUR_CLUBS,
        self::COLOUR_DIAMONDS,
        self::COLOUR_HEARTS,
        self::COLOUR_SPADES,
    );

    const VALUES = array(
        self::VALUE_ACE,
        self::VALUE_TWO,
        self::VALUE_THREE,
        self::VALUE_FOUR,
        self::VALUE_FIVE,
        self::VALUE_SIX,
        self::VALUE_SEVEN,
        self::VALUE_EIGHT,
        self::VALUE_NINE,
        self::VALUE_TEN,
        self::VALUE_JACK,
        self::VALUE_QUEEN,
        self::VALUE_KING,
    );

    /** @var Card[] */
    private $cards = array();

    /**
     * Deck constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        foreach (self::COLOURS as $colour) {
            foreach (self::VALUES as $value) {
                $this->cards[] = new Card($colour, $value);
            }
        }
    }

    /**
     * @return Card[]
     */
    public function getCards(): array
    {
        return $this->cards;
    }

    /**
     * @param Card[] $cards
     * @return Deck
     */
    public function setCards(array $cards): Deck
    {
        $this->cards = $cards;
        return $this;
    }

    /**
     * @param int $n
     * @throws \Exception
     */
    public function shuffle($n = 1)
    {
        if ($n <= 0) {
            throw new \Exception("Your shuffle value must be >= 1");
        }
        for ($i = 1; $i <= $n; $i++) {
            shuffle($this->cards);
        }
    }

    /**
     * @return Card[]
     */
    public function getHand()
    {
        return array_slice($this->cards, 0, 10);
    }

}
