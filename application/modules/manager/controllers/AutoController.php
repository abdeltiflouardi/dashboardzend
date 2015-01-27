<?php

class Manager_AutoController extends Manager_BaseController
{

    public function init()
    {
        $this->view->menuAuto = true;

        parent::init();
    }

    public function indexAction()
    {
        // action body
    }

}

