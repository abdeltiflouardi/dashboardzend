<?php

class Admin_ModelController extends Admin_BaseController
{

    public function init()
    {
        $this->view->list = $this->getPageItems('Application_Model_ModelesMapper');

        parent::init();
    }

    public function indexAction()
    {
        // action body
    }
    
    public function addAction() {
        $this->processForm();
    }

    public function editAction() {
        $this->processForm();
    }
    
    private function processForm()
    {
        $modelForm = new Admin_Form_Model();

        // ID of entity to edit
        $id = $this->getRequest()->getParam('id');

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($modelForm->isValid($request->getPost())) {
                $model = new Application_Model_Modeles($modelForm->getValues());
                $modelMapper = new Application_Model_ModelesMapper();
                $modelMapper->save($model);

                $this->_helper->getHelper('Redirector')->setGotoRoute(
                        array('controller' => 'model', 'action' => 'edit', 'id' => $model->getModeleID()), 'adminActionRoute');
            }
        } elseif ($id !== null) {
            $model = new Application_Model_ModelesMapper();
            $modelForm->populate($model->getDataFormById($id));
        }

        $this->view->id = $id;
        $this->view->modelForm = $modelForm;
        $this->render('form');
    }    

}

