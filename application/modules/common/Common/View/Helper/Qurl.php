<?php

/**
 * @author ouardisoft
 */
class Common_View_Helper_Qurl extends Zend_View_Helper_Abstract
{

    public function qurl(array $urlOptions = array(), $name = null, $reset = false, $encode = true)
    {
        $params = array();
        if (array_key_exists('params', $urlOptions)) {
            $params = http_build_query($urlOptions['params']);

            unset($urlOptions['params']);
        }

        $router = Zend_Controller_Front::getInstance()->getRouter();
        $url    = $router->assemble($urlOptions, $name, $reset, $encode);

        return sprintf('%s%s%s', $url, '?', $params);
    }

}