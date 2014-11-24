<?php

namespace Worldskills\CareBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Worldskills\CareBundle\Entity\Options;
use Worldskills\CareBundle\Entity\Subject;

class SubjectRestController extends FOSRestController
{
    public function hotSubjectsAction()
    {
        $topTen = $this->getDoctrine()->getRepository('WorldskillsCareBundle:Subject')->getHottest(10);

        $view = $this->view($topTen, 200);
        return $this->handleView($view);
    }

    public function newSubjectsAction()
    {
        $topTen = $this->getDoctrine()->getRepository('WorldskillsCareBundle:Subject')->getHottest(10);

        $view = $this->view($topTen, 200);
        return $this->handleView($view);
    }

    public function postOptionsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $subject = $em->getRepository('WorldskillsCareBundle:Subject')->find($request->request->getInt('subject'));
        if($request->request->has('title') && $subject) {
            $option = new Options();
            $title = $request->request->get('title');
            $title = strip_tags(trim($title));
            $option->setTitle($title);
            $option->setSubject($subject);
            $em->persist($option);
            $em->persist($option->getVoteThread());
            $em->flush();

            $view = $this->view($subject);
        } else {
            $view = $this->view('Bad Request', 400);
        }

        return $this->handleView($view);
    }

    public function putOptionsAction(Request $request) {

    }

}
