<?php

class Manager_DashboardController extends Manager_BaseController
{

    public function init()
    {
        $this->view->menuHome = true;

        parent::init();
    }

    public function indexAction()
    {
        // action body
    }

}

