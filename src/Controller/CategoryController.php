<?php
// src/Controller/CategoryController.php
namespace App\Controller;

use App\Repository\ProgramRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/category', name: 'category_')]
class CategoryController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();
        return $this->render('category/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[ROUTE('/{name}', name: 'show')]
    public function show(string $name, CategoryRepository $categoryRepository, ProgramRepository $programRepository,): Response
    {
        $category = $categoryRepository->findOneBy(['name' => $name]);


        if (!$category) {
            throw $this->createNotFoundException(
                'No program with name : ' . $name . ' found in program\'s table.'
            );
        } else {
            $programs = $programRepository->findBy(['category' => $category->getId()], ['id' => 'desc'], 3);
        }
        return $this->render('category/show.html.twig', [
            'category' => $category, 'programs' => $programs,
        ]);
    }
}
