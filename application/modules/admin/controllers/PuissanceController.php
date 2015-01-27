<?php

class Admin_PuissanceController extends Admin_BaseController
{

    public function init()
    {
        $this->view->list = $this->getPageItems('Application_Model_PuissancesMapper');

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
        $puissanceForm = new Admin_Form_Puissance;

        // ID of entity to edit
        $id = $this->getRequest()->getParam('id');

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($puissanceForm->isValid($request->getPost())) {
                $puissance = new Application_Model_Puissances($puissanceForm->getValues());
                $puissanceMapper = new Application_Model_PuissancesMapper();
                $puissanceMapper->save($puissance);

                $this->_helper->getHelper('Redirector')->setGotoRoute(
                        array('controller' => 'puissance', 'action' => 'edit', 'id' => $puissance->getPuissanceID()), 'adminActionRoute');
            }
        } elseif ($id !== null) {
            $puissance = new Application_Model_PuissancesMapper();
            $puissanceForm->populate($puissance->getDataFormById($id));
        }

        $this->view->id = $id;
        $this->view->puissanceForm = $puissanceForm;
        $this->render('form');
    }    

}

