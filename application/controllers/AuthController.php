<?php

class AuthController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
    }

    public function loginAction() {
        $loginForm = $this->getLoginForm();

        $request = $this->getRequest();
        if ($request->isPost()) {
            if (!$loginForm->isValid($request->getPost())) {
                $this->view->loginForm = $loginForm;

                return $this->render('login');
            }

            $adapter = $this->getAuthAdapter($loginForm->getValues());

            $auth = Zend_Auth::getInstance();
            $result = $auth->authenticate($adapter);
            if (!$result->isValid()) {
                // Identifiants invalides
                $loginForm->setDescription('Invalid credentials provided');

                $this->view->loginForm = $loginForm;
                return $this->render('login');
            }
            
            $this->_helper->getHelper('Redirector')->setGotoRoute(array(), 'adminRoute');
        }

        $this->view->loginForm = $loginForm;
    }

    public function getLoginForm() {
        return new Application_Form_Login();
    }

    public function getAuthAdapter(array $params) {
        $adapter = Zend_Db_Table_Abstract::getDefaultAdapter();
        $authAdapter = new Zend_Auth_Adapter_DbTable($adapter);

        $authAdapter->setTableName('Souscripteurs');
        $authAdapter->setIdentityColumn('SouscripteurEmail');
        $authAdapter->setCredentialColumn('SouscripteurPassword');

        $authAdapter->setIdentity($params['username']);
        $authAdapter->setCredential($params['password']);

        return $authAdapter;
    }

    public function logoutAction() {
        Zend_Auth::getInstance()->clearIdentity();
        
        $this->_helper->getHelper('Redirector')->setGotoRoute(array(), 'adminRoute');
    }

}

