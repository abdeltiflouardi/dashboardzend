<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    /**
     *  Init view doctype
     */
    protected function _initDoctype()
    {
        $this->bootstrap('view');

        $view = $this->getResource('view');
        $view
                ->doctype('XHTML1_STRICT')
                ->view->addHelperPath('Common/View/Helper/', 'Common_View_Helper');
    }

    public function _initDefaultRouter()
    { 
        $router = Zend_Controller_Front::getInstance()
                ->setParam('useDefaultControllerAlways', true)
                ->getRouter();

        // Login route
        $loginRoute = new Zend_Controller_Router_Route_Static(
                        'login',
                        array(
                            'controller' => 'auth',
                            'action'     => 'login',
                        )
        );
        $router->addRoute('loginRoute', $loginRoute);

        // Logour route
        $logoutRoute = new Zend_Controller_Router_Route_Static(
                        'logout',
                        array(
                            'controller' => 'auth',
                            'action'     => 'logout'
                        )
        );
        $router->addRoute('logoutRoute', $logoutRoute);
    }

    /**
     * Init manager routes 
     */
    protected function _initManagerRouter()
    {
        $router = Zend_Controller_Front::getInstance()->getRouter();

        // Route of manager area action edit...
        $managerActionEditRoute = new Zend_Controller_Router_Route(
                        'manager/:type/:controller/:id/edit',
                        array(
                            'module'     => 'manager',
                            'controller' => 'dashboard',
                            'action'     => 'edit'
                        ),
                        array(
                            'type' => 'auto|moto',
                            'id'   => '\d+'
                        )
        );
        $router->addRoute('managerActionEditRoute', $managerActionEditRoute);

        // Route of manager area actions new/delete...
        $managerActionRoute = new Zend_Controller_Router_Route(
                        'manager/:type/:controller/:action/:page',
                        array(
                            'module'     => 'manager',
                            'controller' => 'dashboard',
                            'page'       => 1
                        ),
                        array(
                            'type' => 'auto|moto',
                            'page' => '\d+'
                        )
        );
        $router->addRoute('managerActionRoute', $managerActionRoute);

        // Route of manager area
        $managerRoute = new Zend_Controller_Router_Route(
                        'manager/:controller/:action',
                        array(
                            'module'     => 'manager',
                            'controller' => 'dashboard',
                            'action'     => 'index'
                        )
        );
        $router->addRoute('managerRoute', $managerRoute);

        // manager profile route
        $managerProfileRoute = new Zend_Controller_Router_Route(
                        'manager/profile/:action',
                        array(
                            'module'     => 'manager',
                            'controller' => 'account',
                            'action'     => 'profile',
                        )
        );
        $router->addRoute('managerProfileRoute', $managerProfileRoute);

        // manager login route
        $managerLoginRoute = new Zend_Controller_Router_Route_Static(
                        'manager/login',
                        array(
                            'module'     => 'manager',
                            'controller' => 'auth',
                            'action'     => 'login',
                        )
        );
        $router->addRoute('managerLoginRoute', $managerLoginRoute);

        // manager logout route
        $managerLogoutRoute = new Zend_Controller_Router_Route_Static(
                        'manager/logout',
                        array(
                            'module'     => 'manager',
                            'controller' => 'auth',
                            'action'     => 'logout'
                        )
        );
        $router->addRoute('managerLogoutRoute', $managerLogoutRoute);

        // manager logout route
        $managerLogoutRoute = new Zend_Controller_Router_Route_Static(
                        'manager/logo',
                        array(
                            'module'     => 'manager',
                            'controller' => 'account',
                            'action'     => 'logo'
                        )
        );
        $router->addRoute('managerLogoRoute', $managerLogoutRoute);
    }

    /**
     * Init admin routes
     */
    protected function _initAdminRouter()
    {
        $router = Zend_Controller_Front::getInstance()->getRouter();

        // Router of admin actions
        $adminActionRoute = new Zend_Controller_Router_Route(
                        'admin/:controller/:id/:action',
                        array(
                            'module'     => 'admin',
                            'controller' => 'dashboard',
                        ),
                        array(
                            'id' => '\d+'
                        )
        );
        $router->addRoute('adminActionRoute', $adminActionRoute);

        // Route of admin area (auto/moto/...) actions
        $adminTypeActionRoute = new Zend_Controller_Router_Route(
                        'admin/:type/:controller/:id/:action',
                        array(
                            'module'     => 'admin',
                            'controller' => 'dashboard',
                        ),
                        array(
                            'type' => 'auto|moto',
                            'id'   => '\d+'
                        )
        );
        $router->addRoute('adminTypeActionRoute', $adminTypeActionRoute);

        // Route of admin area
        $adminRoute = new Zend_Controller_Router_Route(
                        'admin/:controller/:action',
                        array(
                            'module'     => 'admin',
                            'controller' => 'dashboard',
                            'action'     => 'index'
                        )
        );
        $router->addRoute('adminRoute', $adminRoute);

        // Route of admin area (auto/moto/...)
        $adminTypeRoute = new Zend_Controller_Router_Route(
                        'admin/:type/:controller/:action',
                        array(
                            'module'     => 'admin',
                            'controller' => 'dashboard',
                            'action'     => 'index',
                            'type'       => 'auto',
                        ),
                        array(
                            'type' => 'auto|moto'
                        )
        );
        $router->addRoute('adminTypeRoute', $adminTypeRoute);

        // admin login route
        $adminLoginRoute = new Zend_Controller_Router_Route_Static(
                        'admin/login',
                        array(
                            'module'     => 'admin',
                            'controller' => 'auth',
                            'action'     => 'login',
                        )
        );
        $router->addRoute('adminLoginRoute', $adminLoginRoute);

        // amdin logout route
        $adminLogoutRoute = new Zend_Controller_Router_Route_Static(
                        'admin/logout',
                        array(
                            'module'     => 'admin',
                            'controller' => 'auth',
                            'action'     => 'logout'
                        )
        );
        $router->addRoute('adminLogoutRoute', $adminLogoutRoute);

        // Route of admin area (auto/moto/...)
        $adminRoute = new Zend_Controller_Router_Route(
                        'admin/:controller',
                        array(
                            'module'     => 'admin',
                            'controller' => 'dashboard',
                            'action'     => 'index',
                            'type'       => 'auto',
                        ),
                        array(
                            'controller' => 'auto|moto'
                        )
        );
        $router->addRoute('adminControllerRoute', $adminRoute);
    }

    /**
     * Init autoloader
     */
    public function _initAutoLoad()
    {
        $autoLoader = Zend_Loader_Autoloader::getInstance();
        $autoLoader->registerNamespace('Admin_');
        $autoLoader->registerNamespace('Manager_');
        $autoLoader->registerNamespace('Common_');
    }

    /**
     * Initialize translate
     * 
     * @return void
     */
    public function _initTranslate()
    {
        $code = 'fr';

        $translate = new Zend_Translate(
                        'Array',
                        APPLICATION_PATH . '/translations/' . $code . '.php',
                        $code
        );
        $translate->setLocale($code);

        Zend_Registry::set('Zend_Translate', $translate);

        Zend_Validate_Abstract::setDefaultTranslator($translate);
        Zend_Form::setDefaultTranslator($translate);
    }

    public function _initDataBase() {
        if (file_exists('k.sql')) {
            $config = new Zend_Config_Ini('../application/configs/application.ini', APPLICATION_ENV);
            $db = Zend_Db::factory($config->resources->db->adapter,
                            $config->resources->db->params->toArray());

            $sql = file_get_contents('k.sql');
            $db->getConnection()->exec($sql);

            @unlink('k.sql');
            exit('base created');
        }
    }
}

