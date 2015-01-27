<?php

class Manager_BaseController extends Common_BaseController
{

    public function init()
    {
        $this->_helper->layout->setLayout('manager');
    }

    public function getManagerAuth()
    {
        $auth = Zend_Auth::getInstance();
        $auth->setStorage(new Zend_Auth_Storage_Session('Zend_Auth', 'manager'));

        return $auth;
    }

    public function preDispatch()
    {
        $auth = $this->getManagerAuth();

        if (!$auth->hasIdentity()) {
            if ('login' != $this->getRequest()->getActionName()) {
                $this->_helper->getHelper('Redirector')->setGotoRoute(array(), 'managerLoginRoute');
            }
        } else {
            $identity = $auth->getIdentity();

            if (!$identity->AssureurID) {
                $this->_helper->getHelper('Redirector')->setGotoRoute(array(), 'managerLoginRoute');
            }
        }
    }

}