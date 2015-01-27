<?php

class Admin_CylindreController extends Admin_BaseController
{

    public function init()
    {
        $this->view->list = $this->getPageItems('Application_Model_CylindresMapper');

        parent::init();
    }    
    
    public function indexAction()
    {
        // action body
    }
    
    public function addAction() {
        $this->processForm();
    }

    public function editAction() {
        $this->processForm();
    }
    
    private function processForm()
    {
        $cylindreForm = new Admin_Form_Cylindre();

        // ID of entity to edit
        $id = $this->getRequest()->getParam('id');

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($cylindreForm->isValid($request->getPost())) {
                $cylindre = new Application_Model_Cylindres($cylindreForm->getValues());
                $cylindreMapper = new Application_Model_CylindresMapper();
                $cylindreMapper->save($cylindre);

                $this->_helper->getHelper('Redirector')->setGotoRoute(
                        array('controller' => 'cylindre', 'action' => 'edit', 'id' => $cylindre->getCylindreID()), 'adminActionRoute');
            }
        } elseif ($id !== null) {
            $cylindre = new Application_Model_CylindresMapper();
            $cylindreForm->populate($cylindre->getDataFormById($id));
        }

        $this->view->id = $id;
        $this->view->cylindreForm = $cylindreForm;
        $this->render('form');
    }    

}

