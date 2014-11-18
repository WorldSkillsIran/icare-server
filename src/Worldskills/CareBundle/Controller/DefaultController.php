<?php

namespace Worldskills\CareBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends FOSRestController
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        $topTen = $this->getDoctrine()->getRepository('WorldskillsCareBundle:Subject')->getHottest(10);

        return array('topTen' => $topTen);
    }
}
