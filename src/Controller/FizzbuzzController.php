<?php

namespace App\Controller;

use App\Entity\Fizzbuzz;
use App\Form\FizzbuzzType;
use App\Repository\FizzBuzzRepository;
use App\Tools\FizzBuzzTool;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DateTime;

#[Route('/')]
class FizzbuzzController extends AbstractController
{
    /**
     * @var FizzBuzzTool
     */
    private $formatter;

    /**
     * @param FizzBuzzTool $formatter
     */
    public function __construct(
        FizzBuzzTool $formatter
    )
    {
        $this->formatter = $formatter;
    }

    #[Route('/', name: 'app_fizzbuzz_index', methods: ['GET'])]
    public function index(FizzBuzzRepository $fizzBuzzRepository): Response
    {
        return $this->render('fizzbuzz/index.html.twig');
    }

    #[Route('/desafio1/fizz/buzz', name: 'app_fizzbuzz_desafio1', methods: ['GET', 'POST'])]
    public function desafio1(): Response
    {
        return $this->render('fizzbuzz/desafio1.html.twig');
    }

    #[Route('/desafio2', name: 'app_fizzbuzz_list', methods: ['GET', 'POST'])]
    public function list(FizzBuzzRepository $fizzBuzzRepository): Response
    {
        return $this->render('fizzbuzz/list.html.twig', [
            'fizzbuzzs' => $fizzBuzzRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_fizzbuzz_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FizzBuzzRepository $fizzBuzzRepository): Response
    {
        $fizzbuzz = new Fizzbuzz();
        $form = $this->createForm(FizzbuzzType::class, $fizzbuzz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $date = new DateTime('now');
            $fizzbuzz->setDatehour($date);
            $fizzbuzz->setFizzbuzztext(
                $this->formatter->fizzBuzzString(
                    $fizzbuzz->getStartnumber(),
                    $fizzbuzz->getFinalnumber()
            ));
            $fizzBuzzRepository->add($fizzbuzz, true);

            return $this->redirectToRoute('app_fizzbuzz_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('fizzbuzz/new.html.twig', [
            'fizzbuzz' => $fizzbuzz,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fizzbuzz_show', methods: ['GET'])]
    public function show(Fizzbuzz $fizzbuzz): Response
    {
        return $this->render('fizzbuzz/show.html.twig', [
            'fizzbuzz' => $fizzbuzz,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_fizzbuzz_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Fizzbuzz $fizzbuzz, FizzBuzzRepository $fizzBuzzRepository): Response
    {
        $form = $this->createForm(FizzbuzzType::class, $fizzbuzz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $date = new DateTime('now');
            $fizzbuzz->setDatehour($date);
            $fizzbuzz->setFizzbuzztext(
                $this->formatter->fizzBuzzString(
                    $fizzbuzz->getStartnumber(),
                    $fizzbuzz->getFinalnumber()
            ));
            $fizzBuzzRepository->add($fizzbuzz, true);

            return $this->redirectToRoute('app_fizzbuzz_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('fizzbuzz/edit.html.twig', [
            'fizzbuzz' => $fizzbuzz,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fizzbuzz_delete', methods: ['POST'])]
    public function delete(Request $request, Fizzbuzz $fizzbuzz, FizzBuzzRepository $fizzBuzzRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fizzbuzz->getId(), $request->request->get('_token'))) {
            $fizzBuzzRepository->remove($fizzbuzz, true);
        }

        return $this->redirectToRoute('app_fizzbuzz_index', [], Response::HTTP_SEE_OTHER);
    }
}
