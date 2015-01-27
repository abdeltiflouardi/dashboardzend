<?php

class Admin_TarificationController extends Admin_BaseController
{
    public function init()
    {
        $this->assuranceName = $this->getRequest()->getParam('type');        
        $this->view->list = $this->getPageItems('Application_Model_Tarifications' . ucfirst($this->assuranceName) . 'Mapper');

        // Entity of assurance model by type
        $assuranceMapper = new Application_Model_AssurancesMapper();
        $this->assurance = $assuranceMapper->getAssuranceByName($this->assuranceName);        

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
        $formName = 'Admin_Form_Tarification' . ucfirst($this->assuranceName);
        $tarificationForm = new $formName;

        // ID of entity to edit
        $id = $this->getRequest()->getParam('id');

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($tarificationForm->isValid($request->getPost())) {
                $model = 'Application_Model_Tarifications' . ucfirst($this->assuranceName);
                $modelMapper = $model . 'Mapper';

                $tarification = new $model($tarificationForm->getValues());
                $tarificationMapper = new $modelMapper();
                $tarificationMapper->save($tarification);

                $this->_helper->getHelper('Redirector')->setGotoRoute(
                        array('controller' => 'tarification', 'type' => $this->assuranceName,'action' => 'edit', 'id' => $tarification->getTarificationID()), 'adminTypeActionRoute');
            }
        } elseif ($id !== null) {
            $model = 'Application_Model_Tarifications' . ucfirst($this->assuranceName);
            $modelMapper = $model . 'Mapper';

            $tarification = new $modelMapper();
            $tarificationForm->populate($tarification->getDataFormById($id));
        }

        $this->view->id = $id;
        $this->view->tarificationForm = $tarificationForm;
        $this->render('form');
    }
}

