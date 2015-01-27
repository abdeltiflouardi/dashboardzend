<?php

/**
 * @author ouardisoft 
 */
class Common_View_Helper_GetRequest
{

    public function getRequest()
    {
        return Zend_Controller_Front::getInstance()->getRequest();
    }

}