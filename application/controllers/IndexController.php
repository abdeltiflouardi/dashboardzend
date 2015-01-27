<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $assurances = new Application_Model_AssurancesMapper();
        $this->view->entries = $assurances->fetchAll();
    }


}

