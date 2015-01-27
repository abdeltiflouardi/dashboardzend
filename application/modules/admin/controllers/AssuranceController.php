<?php

class Admin_AssuranceController extends Admin_BaseController
{
    public function init()
    {
        $this->view->list = $this->getPageItems('Application_Model_AssurancesMapper');

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
        $assuranceForm = new Admin_Form_Assurance;

        // ID of entity to edit
        $id = $this->getRequest()->getParam('id');

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($assuranceForm->isValid($request->getPost())) {
                $assurance = new Application_Model_Assurances($assuranceForm->getValues());
                $assuranceMapper = new Application_Model_AssurancesMapper();
                $assuranceMapper->save($assurance);

                $this->_helper->getHelper('Redirector')->setGotoRoute(
                        array('controller' => 'assurance', 'action' => 'edit', 'id' => $assurance->getAssuranceID()), 'adminActionRoute');
            }
        } elseif ($id !== null) {
            $assurance = new Application_Model_AssurancesMapper();
            $assuranceForm->populate($assurance->getDataFormById($id));
        }

        $this->view->id = $id;
        $this->view->assuranceForm = $assuranceForm;
        $this->render('form');
    }
}

