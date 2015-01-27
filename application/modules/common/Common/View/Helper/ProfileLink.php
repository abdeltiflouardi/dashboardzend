<?php

/**
 * @author ouardisoft 
 */
class Common_View_Helper_ProfileLink
{

    public $view;

    public function setView(Zend_View_Interface $view)
    {
        $this->view = $view;
    }

    public function profileLink()
    {
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $identity = $auth->getIdentity();
            return '<span>' . $this->view->translate('title.welcome') . ',</span> ' .
                    '<a href="/profile' . $identity->UtilisateurEmail . '">' . $identity->UtilisateurEmail . '</a> ' .
                    '<a href="' . $this->view->url(array(), 'adminLogoutRoute') . '">' . $this->view->translate('title.logout') . '</a>';
        }

        return '<a href="/login">Login</a>';
    }

}