<?php

class Admin_AttestationController extends Admin_BaseController
{
    public function init()
    {
        $this->view->list = $this->getPageItems('Application_Model_AttestationsMapper');

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
        $attestationForm = new Admin_Form_Attestation;

        // ID of entity to edit
        $id = $this->getRequest()->getParam('id');

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($attestationForm->isValid($request->getPost())) {
                $attestation = new Application_Model_Attestations($attestationForm->getValues());
                $attestationMapper = new Application_Model_AttestationsMapper();
                $attestationMapper->save($attestation);

                $this->_helper->getHelper('Redirector')->setGotoRoute(
                        array('controller' => 'attestation', 'action' => 'edit', 'id' => $attestation->getAttestationID()), 'adminActionRoute');
            }
        } elseif ($id !== null) {
            $attestation = new Application_Model_AttestationsMapper();
            $attestationForm->populate($attestation->getDataFormById($id));
        }

        $this->view->id = $id;
        $this->view->attestationForm = $attestationForm;
        $this->render('form');
    }
}

