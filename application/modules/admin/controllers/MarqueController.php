<?php

class Admin_MarqueController extends Admin_BaseController
{

    public function init()
    {
        $this->view->list = $this->getPageItems('Application_Model_MarquesMapper');

        parent::init();
    }

    public function indexAction()
    {
        
    }

    public function addAction()
    {
        $this->processForm();
    }

    public function editAction()
    {
        $this->processForm();
    }

    private function processForm()
    {
        $marqueForm = new Admin_Form_Marque();

        // ID of entity to edit
        $id = $this->getRequest()->getParam('id');

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($marqueForm->isValid($request->getPost())) {
                $marque = new Application_Model_Marques($marqueForm->getValues());
                $marqueMapper = new Application_Model_MarquesMapper();
                $marqueMapper->save($marque);

                $this->_helper->getHelper('Redirector')->setGotoRoute(
                        array('controller' => 'marque', 'action' => 'edit', 'id' => $marque->getMarqueID()), 'adminActionRoute');
            }
        } elseif ($id !== null) {
            $marque = new Application_Model_MarquesMapper();
            $marqueForm->populate($marque->getDataFormById($id));
        }

        $this->view->id = $id;
        $this->view->marqueForm = $marqueForm;
        $this->render('form');
    }

}

