<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bracket;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Method("GET")
     * @Template("AppBundle:default:index.html.twig")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $round1_8 = $em->getRepository('AppBundle:Bracket')->getBracketByRound(Bracket::ROUND_1_8);
        $round1_4 = $em->getRepository('AppBundle:Bracket')->getBracketByRound(Bracket::ROUND_1_4);
        $round1_2 = $em->getRepository('AppBundle:Bracket')->getBracketByRound(Bracket::ROUND_1_2);
        $roundFinal = $em->getRepository('AppBundle:Bracket')->getBracketByRound(Bracket::ROUND_FINAL);
        $winner = [];
        if($roundFinal){
            $game = $roundFinal[0]->getGame();
            if($game->getScoreTeam1() > $game->getScoreTeam2()){
                $winner = $game->getTeam1();
            }else if($game->getScoreTeam2() > $game->getScoreTeam1()){
               $winner = $game->getTeam2();
            }
        }

        return [
            'round1_8' => $round1_8,
            'round1_4' => $round1_4,
            'round1_2' => $round1_2,
            'roundFinal' => $roundFinal,
            'winner' => $winner
        ];
    }
}
