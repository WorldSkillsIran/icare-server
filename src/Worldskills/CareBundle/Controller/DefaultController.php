<?php
/**
 * Created by PhpStorm.
 * User: worldskill
 * Date: 11/18/14
 * Time: 3:42 AM
 */

namespace Worldskills\CareBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package Worldskills\CareBundle\Controller
 * @Route("/")
 */
class DefaultController extends Controller {

    /**
     * @Route("/")
     */
    public function indexAction() {
        return new Response("This is iCare");
    }
} 