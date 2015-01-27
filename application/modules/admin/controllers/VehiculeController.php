<?php

class Admin_VehiculeController extends Admin_BaseController
{

    public function init()
    {
        $this->view->list = $this->getPageItems('Application_Model_VehiculesMapper');

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
        $vehiculeForm = new Admin_Form_Vehicule;

        // ID of entity to edit
        $id = $this->getRequest()->getParam('id');

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($vehiculeForm->isValid($request->getPost())) {
                $vehicule = new Application_Model_Vehicules($vehiculeForm->getValues());
                $vehiculeMapper = new Application_Model_VehiculesMapper();
                $vehiculeMapper->save($vehicule);

                $this->_helper->getHelper('Redirector')->setGotoRoute(
                        array('controller' => 'vehicule', 'action' => 'edit', 'id' => $vehicule->getVehiculeID()), 'adminActionRoute');
            }
        } elseif ($id !== null) {
            $vehicule = new Application_Model_VehiculesMapper();
            $vehiculeForm->populate($vehicule->getDataFormById($id));
        }

        $this->view->id = $id;
        $this->view->vehiculeForm = $vehiculeForm;
        $this->render('form');
    }

}

