<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Contact;
use App\Repository\ContactRepository;

class AddressFinderController extends AbstractController
{
    #[Route('/', name: 'app_address_finder')]
    public function index(ContactRepository $contactRepository): Response
    {
        $contacts = $contactRepository->findAll();

        return $this->render('address_finder/index.html.twig', [
            'contacts' => $contacts,
        ]);
    }
}
