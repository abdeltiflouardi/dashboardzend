<?php

class Admin_AuthController extends Admin_BaseController
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function loginAction()
    {
        $loginForm = $this->getLoginForm();

        $request = $this->getRequest();
        if ($request->isPost()) {
            if (!$loginForm->isValid($request->getPost())) {
                $this->view->loginForm = $loginForm;

                return $this->render('login');
            }

            $adapter = $this->getAuthAdapter($loginForm->getValues());

            $auth = $this->getAdminAuth();
            $result = $auth->authenticate($adapter);
            if (!$result->isValid()) {
                // Identifiants invalides
                $loginForm->setDescription('Invalid credentials provided');

                $this->view->loginForm = $loginForm;
                return $this->render('login');
            }

            $storage = $auth->getStorage();
            $storage->write($adapter->getResultRowObject(
                            null, 'UtilisateurPassword'
                    ));

            $this->_helper->getHelper('Redirector')->setGotoRoute(array(), 'adminRoute');
        }

        $this->view->loginForm = $loginForm;
    }

    public function getLoginForm()
    {
        return new Application_Form_Login();
    }

    public function getAuthAdapter(array $params)
    {
        $adapter = Zend_Db_Table_Abstract::getDefaultAdapter();
        $authAdapter = new Zend_Auth_Adapter_DbTable($adapter);

        $authAdapter->setTableName('Utilisateurs');
        $authAdapter->setIdentityColumn('UtilisateurEmail');
        $authAdapter->setCredentialColumn('UtilisateurPassword');

        $authAdapter->setIdentity($params['username']);
        $authAdapter->setCredential($params['password']);

        return $authAdapter;
    }

    public function logoutAction()
    {
        $auth = $this->getAdminAuth();
        $auth->clearIdentity();

        $this->_helper->getHelper('Redirector')->setGotoRoute(array(), 'adminRoute');
    }

}

