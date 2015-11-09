<?php

namespace MCM\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SometextController extends Controller
{
    
	//метод для виведення простого тексту на сторінку за допомогою twig
    public function indexAction()
    {
    	$some_text =  'Створіть звичайну сторінку за допомогою окремого контролеру. На сторінку виводиться будь-який текст. Обов’язково для виводу використовуйте twig шаблон. ';

        return $this->render('MCMDemoBundle:Text:text.html.twig', array('text' => $some_text));
    }
}

