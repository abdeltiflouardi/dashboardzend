<?php

class Manager_AccountController extends Manager_BaseController
{

    public function init()
    {
        $this->view->menuProfile = true;

        parent::init();
    }

    public function profileAction()
    { 
        $auth = $this->getManagerAuth();

        $assureurIdentity = $auth->getIdentity();
        $profileForm      = new Manager_Form_Profile();
        $request          = $this->getRequest();
        if ($request->isPost()) {
            if ($profileForm->isValid($request->getPost())) {
                $assureur = new Application_Model_Assureurs($profileForm->getValues());
                $assureur->setAssureurID($assureurIdentity->AssureurID);

                $this->bindUploadedLogo($assureur);                

                $assureurMapper = new Application_Model_AssureursMapper();
                $assureurMapper->save($assureur);

                $this->_helper->getHelper('Redirector')->setGotoRoute(
                        array(
                        ), 'managerProfileRoute'
                );
            }
        } else {
            $assureurMapper = new Application_Model_AssureursMapper();
            $profileForm->populate($assureurMapper->getDataFormById($assureurIdentity->AssureurID));
        }

        $this->view->profileForm = $profileForm;
    }

    private function bindUploadedLogo(Application_Model_Assureurs $assureur)
    {
        if ($assureur->getAssureurLogo() == '') {
            return;
        }

        $logoPathName = LOGO_TMP_PATH . DIRECTORY_SEPARATOR . $assureur->getAssureurLogo();
        $contentLogo = file_get_contents($logoPathName);

        $assureur->setAssureurLogo($contentLogo);

        @unlink($logoPathName);
    }

    public function passwordAction()
    {
        $passwordForm = new Manager_Form_Password();
        $request      = $this->getRequest();
        if ($request->isPost()) {
            if ($passwordForm->isValid($request->getPost())) {
                $passwordRequest = $passwordForm->getValues();

                $auth = $this->getManagerAuth();
                $assureurIdentity = $auth->getIdentity();

                $assureurMapper = new Application_Model_AssureursMapper();
                $assureur       = $assureurMapper->find($assureurIdentity->AssureurID);
                $assureur->AssureurPassword = $passwordRequest['newPassword'];

                $assureur->save();

                $this->_helper->getHelper('Redirector')->setGotoRoute(
                        array('action' => 'password'), 'managerProfileRoute'
                );
            }
        }

        $this->view->passwordForm = $passwordForm;
    }

    public function logoAction()
    {
        $this->_helper->layout->disableLayout();
	$this->_helper->viewRenderer->setNoRender(true);

        $auth = $this->getManagerAuth();
        $assureurIdentity = $auth->getIdentity();

        echo $assureurIdentity->AssureurLogo;
    }
}

