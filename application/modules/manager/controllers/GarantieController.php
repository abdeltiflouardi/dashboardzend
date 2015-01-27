<?php

class Manager_GarantieController extends Manager_BaseController
{

    public function init()
    {
        // Current type (auto/moto/...)
        $this->type = $this->getRequest()->getParam('type');

        // Entity of assurance model by type
        $assuranceMapper = new Application_Model_AssurancesMapper();
        $this->assurance = $assuranceMapper->getAssuranceByName($this->type);

        // current selected menu
        $this->view->{'menu' . ucfirst(strtolower($this->type))} = true;

        parent::init();
    }

    public function configurationAction()
    {
        $model = 'Application_Model_GarantiesAssureursMapper';
        $where = array('AssureurID = ?'  => 1, 'AssuranceID = ?' => $this->assurance->AssuranceID);

        $paginator = $this->paginator($model, $where);

        $garantiesMapper = new Application_Model_GarantiesMapper();
        $garanties       = array();

        foreach ($paginator as $item) {
            if (array_key_exists($item['GarantieID'], $garanties)) {
                continue;
            }

            $garantie = $garantiesMapper->find($item['GarantieID']);
            if ($garantie) {
                $garanties[$item['GarantieID']] = $garantie->GarantieName;
            }
        }

        $this->view->paginator = $paginator;
        $this->view->garanties = $garanties;
    }

    public function newAction()
    {
        $garantieForm = new Manager_Form_Garantie($this->assurance->AssuranceID);

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($garantieForm->isValid($request->getPost())) {
                $garantie = new Application_Model_GarantiesAssureurs($garantieForm->getValues());
                $garantie->setAssuranceID($this->assurance->AssuranceID);
                $garantie->setAssureurID(1);

                $garantieMapper = new Application_Model_GarantiesAssureursMapper();

                $garantieMapper->save($garantie);
            } else {
                $garantieForm->populate($request->getPost());
            }
        }

        $this->view->garantieForm = $garantieForm;
    }

    public function deleteAction()
    {
        $auth        = $this->getManagerAuth();
        $identity    = $auth->getIdentity();
        $assureurID  = $identity->AssureurID;
        $assuranceID = $this->assurance->AssuranceID;
        $garantieID  = $this->getRequest()->getParam('GarantieID', 0);

        $where = compact('assureurID', 'assuranceID', 'garantieID');

        $garantiesAssureursMapper = new Application_Model_GarantiesAssureursMapper();
        $garantiesAssureursMapper->delete($where);

        $this->_helper->getHelper('Redirector')->setGotoRoute(
                array(
                    'controller' => 'garantie',
                    'type'       => $this->type,
                    'action'     => 'configuration'
                ), 'managerActionRoute'
        );
    }

}

