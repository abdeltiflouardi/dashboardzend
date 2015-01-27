<?php

class Admin_CarburantController extends Admin_BaseController
{
    public function init()
    {
        $this->view->list = $this->getPageItems('Application_Model_CarburantsMapper');

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
        $carburantForm = new Admin_Form_Carburant;

        // ID of entity to edit
        $id = $this->getRequest()->getParam('id');

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($carburantForm->isValid($request->getPost())) {
                $carburant = new Application_Model_Carburants($carburantForm->getValues());
                $carburantMapper = new Application_Model_CarburantsMapper();
                $carburantMapper->save($carburant);

                $this->_helper->getHelper('Redirector')->setGotoRoute(
                        array('controller' => 'carburant', 'action' => 'edit', 'id' => $carburant->getCarburantID()), 'adminActionRoute');
            }
        } elseif ($id !== null) {
            $carburant = new Application_Model_CarburantsMapper();
            $carburantForm->populate($carburant->getDataFormById($id));
        }

        $this->view->id = $id;
        $this->view->carburantForm = $carburantForm;
        $this->render('form');
    }
}

