<?php

class Admin_PackageController extends Admin_BaseController
{

    public function init()
    {
        $this->assuranceName = $this->getRequest()->get('type');

        $assuranceMapper = new Application_Model_AssurancesMapper();
        $this->assurance = $assuranceMapper->getAssuranceByName($this->assuranceName);

        $this->view->list = $this->getPageItems('Application_Model_PackagesMapper', array('AssuranceID = ?' => $this->assurance->getAssuranceID()));

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
        $packageForm = new Admin_Form_Package($this->assurance->getAssuranceID());

        // ID of entity to edit
        $id = $this->getRequest()->getParam('id');

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($packageForm->isValid($request->getPost())) {
                $package       = new Application_Model_Packages($packageForm->getValues());
                $package->setAssuranceID($this->assurance->getAssuranceID());

                $packageMapper = new Application_Model_PackagesMapper();
                $packageMapper->save($package);

                $this->_helper->getHelper('Redirector')->setGotoRoute(
                        array(
                            'controller' => 'package', 
                            'action'     => 'edit', 
                            'id'         => $package->getPackageID(),
                            'type'       => $this->assuranceName,
                        ), 'adminTypeActionRoute');
            }
        } elseif ($id !== null) {
            $package = new Application_Model_PackagesMapper();
            $packageForm->populate($package->getDataFormById($id));
        }

        $this->view->id = $id;
        $this->view->packageForm = $packageForm;
        $this->render('form');
    }

}

