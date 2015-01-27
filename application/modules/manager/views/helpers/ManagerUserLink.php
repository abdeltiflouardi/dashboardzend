<?php

/**
 * Description of ManagerUserLink
 *
 * @author ouardisoft
 */
class Manager_View_Helper_ManagerUserLink extends Zend_View_Helper_Abstract
{

    private $linkFormat = '<img src="%s" style="width: 125px; height: 42px;" /><span>%s</span>';

    public function managerUserLink()
    {
        $auth = Zend_Auth::getInstance();
        $auth->setStorage(new Zend_Auth_Storage_Session('Zend_Auth', 'manager'));

        if ($auth->hasIdentity()) {
            $identity = $auth->getIdentity();

            return sprintf($this->linkFormat, $this->view->url(array(), 'managerLogoRoute'), $identity->AssureurName);
        }
        return null;
    }

}

?>
