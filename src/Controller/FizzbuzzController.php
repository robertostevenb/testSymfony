<?php

namespace App\Controller;

use App\Entity\Fizzbuzz;
use App\Form\FizzbuzzType;
use App\Repository\FizzBuzzRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class FizzbuzzController extends AbstractController
{
    #[Route('/desafio1', name: 'app_fizzbuzz_index', methods: ['GET'])]
    public function index(FizzBuzzRepository $fizzBuzzRepository): Response
    {
        return $this->render('fizzbuzz/index.html.twig', [
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
            $fizzBuzzRepository->add($fizzbuzz, true);

            return $this->redirectToRoute('app_fizzbuzz_index', [], Response::HTTP_SEE_OTHER);
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
            $fizzBuzzRepository->add($fizzbuzz, true);

            return $this->redirectToRoute('app_fizzbuzz_index', [], Response::HTTP_SEE_OTHER);
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
