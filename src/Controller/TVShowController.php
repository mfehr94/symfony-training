<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\TvShowRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TVShowController extends AbstractController
{
    /**
     * @param TvShowRepository $repository
     *
     * @return Response
     *
     * @Route(path="/shows", name="tv_shows_list")
     */
    public function index(TvShowRepository $repository): Response
    {
        return $this->render('tv_shows/index.html.twig', [
            'tv_shows' => $repository->findAll(),
        ]);
    }

    /**
     * @param TvShowRepository $repository
     * @param string $slug
     *
     * @return Response
     *
     * @Route(path="/shows/{slug}", name="tv_shows_view")
     * @IsGranted("ROLE_USER")
     */
    public function view(TvShowRepository $repository, string $slug): Response
    {
        return $this->render('tv_shows/view.html.twig', [
            'tv_show' => $repository->findOneBySlug($slug),
        ]);
    }
}
