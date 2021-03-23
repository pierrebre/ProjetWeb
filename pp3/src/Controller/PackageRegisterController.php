<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Colis;
use App\Form\PackageRegisterFormType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PackageRegisterController extends AbstractController
{
    /**
     * @Route("/packageRegister", name="packageRegister")
     */
    public function registerPackage(Colis $colis=null, Request $request, ObjectManager $manager)
    {

        $colis = new Colis;

        $form = $this->createForm(PackageRegisterFormType::class, $colis);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $leUser = $this->getUser();
            $colis->setLeUser($leUser);

            $manager->persist($colis);
            $manager->flush();

            return $this->redirectToRoute('mescolis');
        }
        
        return $this->render('package_register/index.html.twig', [
            'packageRegisterForm' => $form->createView(),
        ]);
    }
}
