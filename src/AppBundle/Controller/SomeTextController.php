<?php
// src/AppBundle/Controller/SomeTextController.php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


class SomeTextController extends Controller
{



    /**
     * @Route("/some_text2")
     */
    public function some_textAction()
    {
        $some_text =  'Створіть звичайну сторінку за допомогою окремого контролеру. На сторінку виводиться будь-який текст. Обов’язково для виводу використовуйте twig шаблон. ';

        return $this->render(
            'some_text/text.html.twig', array('text' => $some_text)
        );
    }




}