<?php

class Manager_TarificationController extends Manager_BaseController
{

    public function init()
    {
        // Current type (auto/moto/...)
        $type = $this->getRequest()->getParam('type');

        // current selected menu
        $this->view->{'menu' . ucfirst(strtolower($type))} = true;

        parent::init();
    }

    public function listAction()
    {
        // init vars
        $where = array();

        // Choisir le model par type
        $type        = $this->getRequest()->getParam('type');
        $model       = 'Application_Model_Tarifications' . ucfirst($type);
        $modelMapper = 'Application_Model_Tarifications' . ucfirst($type) . 'Mapper';
        $filterForm  = 'Manager_Form_FilterTarification' . ucfirst($type);

        // FilterForm tarification
        $tarificationFilterForm = new $filterForm(array('method' => Zend_Form::METHOD_GET));

        // Si les données sont envoyé
        if ($this->getRequest()->has('Rechercher')) {
            $params = $this->getRequest()->getParams();

            // Merger les données transmit avec le modèle
            $tarification = new $model($params);
            // Publié les données dans leurs champs
            $tarificationFilterForm->populate($params);

            // Génerer la clause where
            $where = $this->queryBuilder($tarification);
        }

        $this->view->paginator = $this->paginator($modelMapper, $where);
        $this->view->tarificationFilterForm = $tarificationFilterForm;
    }

    /**
     * Générer la requête convenable aux critères de recherche
     * 
     * @param Application_Model_TarificationsAuto|Application_Model_TarificationsMoto $tarification
     * @return array 
     */
    public function queryBuilder($tarification)
    {
        // init vars
        $where  = $fields = array();

        if ($tarification instanceof Application_Model_TarificationsAuto) {
            $fields = array(
                'UsageID',
                'GarantieID',
                'CarburantID',
                'PuissanceID',
                'Prime',
                'Franchise',
                'ValeurDeclaree'
            );
        } elseif ($tarification instanceof Application_Model_TarificationsMoto) {
            $fields = array(
                'GarantieID',
                'CylindreID',
                'NbRoue',
                'Prime',
            );
        }
        foreach ($fields as $field) {
            if ($tarification->{'get' . $field}()) {
                $key         = $field . ' = ?';
                $where[$key] = $tarification->{'get' . $field}();
            }
        }

        return $where;
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
        $type             = $this->getRequest()->getParam('type');
        $id               = $this->getRequest()->getParam('id');
        $form             = 'Manager_Form_Tarification' . ucfirst($type);
        $tarificationForm = new $form();
        $request          = $this->getRequest();
        if ($request->isPost()) {
            if ($tarificationForm->isValid($request->getPost())) {
                $model       = 'Application_Model_Tarifications' . ucfirst($type);
                $modelMapper = 'Application_Model_Tarifications' . ucfirst($type) . 'Mapper';

                $tarification = new $model($tarificationForm->getValues());

                $tarificationMapper = new $modelMapper();
                $tarificationMapper->save($tarification);

                $this->_helper->getHelper('Redirector')->setGotoRoute(array(
                    'controller' => 'tarification',
                    'type'       => $type,
                    'action'     => 'edit',
                    'id'         => $tarification->getTarificationID()
                        ), 'managerActionEditRoute');
            }
        } elseif ($id !== null) {
            $modelMapper = 'Application_Model_Tarifications' . ucfirst($type) . 'Mapper';

            $tarification = new $modelMapper();
            $tarificationForm->populate($tarification->getDataFormById($id));
        }
        $this->view->tarificationForm = $tarificationForm;

        $this->render('form');
    }

}
