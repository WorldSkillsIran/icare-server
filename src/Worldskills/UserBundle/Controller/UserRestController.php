<?php

namespace Worldskills\UserBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class UserRestController extends FOSRestController
{
    public function meUserAction()
    {
        $security = $this->container->get('security.context');
        if($security->getToken()->isAuthenticated()) {
            $view = $this->view('Access Denied', 403);
        } else {
            $user = $security->getToken()->getUser();
            $view = $this->view($user);
        }

        return $this->handleView($view);
    }
}
