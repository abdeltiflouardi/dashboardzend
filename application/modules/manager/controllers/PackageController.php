<?php

class Manager_PackageController extends Manager_BaseController
{

    public function init()
    {
        // Current type (auto/moto/...)
        $type = $this->getRequest()->getParam('type');

        // Entity of assurance model by type
        $assuranceMapper = new Application_Model_AssurancesMapper();
        $this->assurance = $assuranceMapper->getAssuranceByName($type);

        // Entity of assureur model by connected member
        $auth = $this->getManagerAuth();

        $this->assureur = new Application_Model_Assureurs((array) $auth->getIdentity());

        // current selected menu
        $this->view->{'menu' . ucfirst(strtolower($type))} = true;

        parent::init();
    }

    public function listAction()
    {
        $where = array(
            'AssuranceID = ?' => $this->assurance->getAssuranceID(),
            'AssureurID = ?'  => $this->assureur->getAssureurID(),
        );

        $paginator = $this->paginator('Application_Model_PackagesMapper', $where);

        $packagesMapper    = new Application_Model_PackagesMapper();
        $packagesGaranties = array();

        foreach ($paginator as $item) {
            $packagesGaranties[$item['PackageID']] = $packagesMapper->getGarantiesByPackageId($item['PackageID']);
        }

        $this->view->paginator = $paginator;
        $this->view->packagesGaranties = $packagesGaranties;
    }

    public function newAction()
    {
        $this->processForm();
    }

    public function editAction()
    {
        $this->processForm();
    }

    public function processForm()
    {
        $type        = $this->getRequest()->getParam('type');
        $id          = $this->getRequest()->getParam('id');
        $packageForm = new Manager_Form_Package($this->assurance->getAssuranceID());
        $request     = $this->getRequest();
        if ($request->isPost()) {
            if ($packageForm->isValid($request->getPost())) {
                $package = new Application_Model_Packages($packageForm->getValues());
                $package->setAssuranceID($this->assurance->getAssuranceID());
                $package->setAssureurID($this->assureur->getAssureurID());

                $packageMapper = new Application_Model_PackagesMapper();
                $packageMapper->save($package);

                $this->_helper->getHelper('Redirector')->setGotoRoute(
                        array('controller' => 'package', 'type'       => $type, 'action'     => 'edit', 'id'         => $package->getPackageID()), 'managerActionEditRoute');
            }
        } elseif ($id !== null) {
            $package = new Application_Model_PackagesMapper();
            $packageForm->populate($package->getDataFormById($id));
        }
        $this->view->packageForm = $packageForm;

        $this->render('form');
    }

}

