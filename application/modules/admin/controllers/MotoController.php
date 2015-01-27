<?php

class Admin_MotoController extends Admin_BaseController
{
    public function init()
    {
        $this->getRequest()->setParam('type', 'moto');

        parent::init();
    }

    public function indexAction()
    {
        // action body
    }


}

