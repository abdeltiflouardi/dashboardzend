<?php

class Admin_BaseController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_helper->layout->setLayout('admin');
    }

    public function getAdminAuth()
    {
        $auth = Zend_Auth::getInstance();
        $auth->setStorage(new Zend_Auth_Storage_Session('Zend_Auth', 'admin'));

        return $auth;
    }

    public function preDispatch()
    {
        $auth = $this->getAdminAuth();

        if (!$auth->hasIdentity()) {
            if ('login' != $this->getRequest()->getActionName()) {
                $this->_helper->getHelper('Redirector')->setGotoRoute(array(), 'adminLoginRoute');
            }
        } else {
            $identity = $auth->getIdentity();

            if (!$identity->UtilisateurID) {
                $this->_helper->getHelper('Redirector')->setGotoRoute(array(), 'adminLoginRoute');
            }
        }
    }

    public function getPageItems($entityMapperName, $where = array())
    {
        $entityMapper = new $entityMapperName();

        return $entityMapper->fetchAll($where);
    }

}

