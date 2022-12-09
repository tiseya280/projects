<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Entity\Auteur;
use App\Entity\Compte;
use App\Repository\AuteurRepository;
use Doctrine\ORM\EntityManagerInterface;

class PagesController extends AbstractController
{
    #[Route('/acceuil', name: 'app_pages')]
    public function acceuil(): Response
    {
        return $this->render('pages/accueil.html.twig', );
    }
/*add an author */
    #[Route("/acceuiladd", name:"auteuradd111")]
     public function addAuteur(EntityManagerInterface $entityManager)
        {
       $auteur = new Auteur();
       $compte = new Compte();
       $compte->setLogin("jhon3wick");
       $compte->setMotDePasse("123456");
       $compte->setNom("Eya");
       $compte->setPrenom("jhon");
       $compte->setEmail("wick.jhon@gmail.com");

       $auteur->setDateNaissance("21/05/1999");
       $auteur->setVille("California");
       $auteur->setPhoto("photo.jpg");
       $auteur->setCompte($compte);
       $entityManager->persist($auteur);
       $entityManager->persist($compte);
       $entityManager->flush();
       return $this->render('pages/auteursD.html.twig', ['controller name' => 'PagesController','auteur' => $auteur,'adjectif' => 'ajoutee' ]);
       } 
     
    /*afficher all*/ 
    #[Route("/showall", name:"auteurshow")]
       public function showAllPersonne(AuteurRepository $personneRepository) 
         {
            $auteur = $personneRepository->findAll();
            if (!$auteur) {
            throw $this->createNotFoundException('La table est vide'); }
            return $this->render('pages/auteursTous.html.twig', ['controller name' => 'PagesController','auteur' => $auteur,'adjectif' => 'trouve' ]);
        } 
     /*afficher un auteur selon l id given in the url*/
        #[Route("/show/{id}", name:"auteurshowByID")]
       public function showAuthor(int $id, AuteurRepository $personneRepository) 
         {
            $auteur = $personneRepository->find($id);
            if (!$auteur) {
            throw $this->createNotFoundException('Personne non trouvee avec id '. $id); }
            return $this->render('pages/auteursC.html.twig', ['controller name' => 'PagesController','user' => $auteur,'adjectif' => 'trouve' ]);
        } 
    
      












    #[Route('/auteursC', name: 'app_auteursC')]
    public function auteurC(): Response
    {
        return $this->render('pages/auteursC.html.twig', );
    }
    
    #[Route('/auteurD', name: 'app_auteursD')]
    public function auteursD(): Response
    {
        return $this->render('pages/auteursD.html.twig', );
    }

    #[Route('/compte', name: 'app_compte')]
    public function compte(): Response
    {
        return $this->render('pages/compte.html.twig', );
    }
    
    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('pages/contact.html.twig', );
    }

    #[Route('/genres', name: 'app_genres')]
    public function genres(): Response
    {
        return $this->render('pages/genres.html.twig', );
    }
    
}
