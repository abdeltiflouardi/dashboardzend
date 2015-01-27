<?php

class Admin_AssureurController extends Admin_BaseController
{
    public function init()
    {
        $this->view->list = $this->getPageItems('Application_Model_AssureursMapper');

        parent::init();
    }

    public function indexAction()
    {
        // action body
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
        $assureurForm = new Admin_Form_Assureur;

        // ID of entity to edit
        $id = $this->getRequest()->getParam('id');

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($assureurForm->isValid($request->getPost())) {
                $assureur = new Application_Model_Assureurs($assureurForm->getValues());
                $assureurMapper = new Application_Model_AssureursMapper();
                $assureurMapper->save($assureur);

                $this->_helper->getHelper('Redirector')->setGotoRoute(
                        array('controller' => 'assureur', 'action' => 'edit', 'id' => $assureur->getAssureurID()), 'adminActionRoute');
            }
        } elseif ($id !== null) {
            $assureur = new Application_Model_AssureursMapper();
            $assureurForm->populate($assureur->getDataFormById($id));
        }

        $this->view->id = $id;
        $this->view->assureurForm = $assureurForm;
        $this->render('form');
    }
}

