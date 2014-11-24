<?php

namespace Worldskills\CareBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
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

    public function postSubjectsAction(Request $request)
    {
        $tags = $request->request->get('tags', array());
        if($request->request->has('title') && is_array($tags)) {
            $title = $request->request->get('title');
            $title = strip_tags(trim($title));

            $em = $this->getDoctrine()->getManager();

            $subject = new Subject();
            foreach ($tags as $tag) {
                $tag = $em->getRepository('WorldskillsCareBundle:Tag')->find($tag);
                if(! $tag) {
                    $view = $this->view('Bad Request', 400);
                    return $this->handleView($view);
                }

                $subject->setUser($this->get('security.context')->getToken()->getUser());
                $subject->addTag($tag);
            }

            $subject->setTitle($title);

            $em->persist($subject);
            $em->persist($subject->getVoteThread());
            $em->flush();

            $view = $this->view($subject);
        } else {
            $view = $this->view('Few Arguments', 400);
        }

        return $this->handleView($view);
    }


    public function getSubjectKeywordsAction($keywords)
    {
        $em = $this->getDoctrine()->getManager();
        $subjects = $em->getRepository('WorldskillsCareBundle:Subject')->queryTitle($keywords);
        $view = $this->view($subjects);
        return $this->handleView($view);
    }

}
