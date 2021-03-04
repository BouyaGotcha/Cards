<?php

namespace App\Controller;

use App\Entity\Deck;
use App\Service\Game;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Home extends AbstractController
{

    /** @var Game */
    private $gameService;

    public function __construct(Game $gameService)
    {
        $this->gameService = $gameService;
    }

    /**
     * @Route("/", name="home")
     * @return Response
     */
    public function index()
    {
        $game = $this->gameService->init();
        $unsortedCards = $this->gameService->getDeck()->getHand();
        $sortedCards = $this->gameService->sortHand($unsortedCards);
        return $this->render("home/index.html.twig", array(
            "unsorted" => $unsortedCards,
            "sorted" => $sortedCards,
            "colourSort" => $this->gameService->getColourSort(),
            "valueSort" => $this->gameService->getValueSort(),
        ));
        //return new Response(json_encode($cards));
    }

}