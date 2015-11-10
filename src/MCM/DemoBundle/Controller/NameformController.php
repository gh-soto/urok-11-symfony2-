<?php

namespace MCM\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MCM\DemoBundle\Entity\Name;
use MCM\DemoBundle\Form\NameformType;

class NameformController extends Controller
{
	public function newnameAction(Request $request)

	{
		$name = new Name();

		$form = $this->createFormBuilder($name)
			->add('first_name', 'text')
			->add('second_name', 'text')
			->add('save', 'submit')
			->getForm();

		$form->handleRequest($request);
		if ($form->isValid()) {
			return $this->redirect($this->generateUrl('name_ok'));
		}

		return $request;
	}

}