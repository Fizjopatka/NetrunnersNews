<?php

namespace App\Controller;

use App\Entity\News;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(PaginatorInterface $paginator, Request $request)
    {
        // $data = $this->getDoctrine()->getRepository(News::class)->findAll();
        // return $this->render('main/index.html.twig', [
        //     'list' => $data
        // ]);
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository(News::class)->SearchForNews();
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1), 6,
            array('defaultSortFieldName' => 'a.date', 'defaultSortDirection' => 'desc')
        );
        return $this->render('main/index.html.twig', [
            'pagination' => $pagination
        ]);
    }
}
