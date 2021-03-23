<?php

namespace App\Controller;

use App\Entity\Colis;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MesColisController extends AbstractController
{
    /**
     * @Route("/mescolis", name="mescolis")
     */
    public function index()
    {
        return $this->render('mes_colis/index.html.twig', [
            'MesColis' => 'MesColisController',
        ]);
    }
}
