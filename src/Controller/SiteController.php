<?php

namespace App\Controller;

use App\Entity\Page;
use App\Repository\PageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(PageRepository $pageRepository): Response
    {
        $this->get('twig')->addGlobal('headerName', 'homepage');
        $page = $pageRepository->findByHomepage();
        
        return $this->render('site/homepage.html.twig', [
            'page' => $page,
            'title' => $page->getTitle(),
            'blocks' => $page->getBlocks()
        ]);
    }

    /**
     * @Route("/account", name="account")
     */
    public function account(): Response
    {
        return $this->render('site/account.html.twig', [
            'title' => 'Аккаунт',
        ]);
    }
    
    /**
     * @Route("/{alias}", name="page_show", methods={"GET"})
     */
    public function show(Page $page): Response
    {
        $this->get('twig')->addGlobal('headerName', $page->getAlias());

        return $this->render('site/show.html.twig', [
            'page' => $page,
            'title' => $page->getTitle(),
            'blocks' => $page->getBlocks()
        ]);
    }
}
