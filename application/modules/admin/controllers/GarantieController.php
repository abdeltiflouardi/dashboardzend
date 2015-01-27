<?php

class Admin_GarantieController extends Admin_BaseController
{

    public function init()
    {
        $this->assuranceName = $this->getRequest()->getParam('type');

        // Entity of assurance model by type
        $assuranceMapper = new Application_Model_AssurancesMapper();
        $this->assurance = $assuranceMapper->getAssuranceByName($this->assuranceName);

        $where = array('AssuranceID = ?' => $this->assurance->getAssuranceID());
        $this->view->list = $this->getPageItems('Application_Model_GarantiesMapper', $where);

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
        $garantieForm = new Admin_Form_Garantie();

        // ID of entity to edit
        $id = $this->getRequest()->getParam('id');

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($garantieForm->isValid($request->getPost())) {
                $garantie = new Application_Model_Garanties($garantieForm->getValues());
                $garantie->setAssuranceID($this->assurance->getAssuranceID());

                $garantieMapper = new Application_Model_GarantiesMapper();
                $garantieMapper->save($garantie);

                $this->_helper->getHelper('Redirector')->setGotoRoute(
                        array(
                            'controller' => 'garantie',
                            'action'     => 'edit',
                            'id'         => $garantie->getGarantieID(),
                            'type'       => $this->assuranceName,
                        ), 'adminTypeActionRoute');
            }
        } elseif ($id !== null) {
            $garantie = new Application_Model_GarantiesMapper();
            $garantieForm->populate($garantie->getDataFormById($id));
        }

        $this->view->id = $id;
        $this->view->garantieForm = $garantieForm;
        $this->render('form');
    }

}

