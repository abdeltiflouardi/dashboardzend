<?php

class Admin_UsageController extends Admin_BaseController
{

    public function init()
    {
        $this->view->list = $this->getPageItems('Application_Model_UsagesMapper');

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
        $usageForm = new Admin_Form_Usage;

        // ID of entity to edit
        $id = $this->getRequest()->getParam('id');

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($usageForm->isValid($request->getPost())) {
                $usage = new Application_Model_Usages($usageForm->getValues());
                $usageMapper = new Application_Model_UsagesMapper();
                $usageMapper->save($usage);

                $this->_helper->getHelper('Redirector')->setGotoRoute(
                        array('controller' => 'usage', 'action' => 'edit', 'id' => $usage->getUsageID()), 'adminActionRoute');
            }
        } elseif ($id !== null) {
            $usage = new Application_Model_UsagesMapper();
            $usageForm->populate($usage->getDataFormById($id));
        }

        $this->view->id = $id;
        $this->view->usageForm = $usageForm;
        $this->render('form');
    }

}

