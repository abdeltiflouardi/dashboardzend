<?php

class Manager_SouscripteurController extends Manager_BaseController
{

    public function init()
    {
        $this->view->menuSouscripteur = true;

        parent::init();
    }

    public function indexAction()
    {
        $souscripteurFilterForm = new Manager_Form_FilterSouscripteur();

        if ($this->getRequest()->has('Rechercher')) {
            $params = $this->getRequest()->getParams();

            // Merger les données transmit avec le modèle
            $souscripteur = new Application_Model_Souscripteurs($params);

            // Publié les données dans leurs champs
            $souscripteurFilterForm->populate($params);

            // Générate la clause where
            $where = $this->queryBuilder($souscripteur);
        }

        $this->view->paginator = $this->paginator('Application_Model_SouscripteursMapper', $where);
        $this->view->souscripteurFilterForm = $souscripteurFilterForm;
    }

    public function queryBuilder(Application_Model_Souscripteurs $souscripteur)
    {
        $where = array();

        $fields = array(
            'SouscripteurID',
            'SouscripteurCIN',
            'SouscripteurNom',
            'SouscripteurPrenom',
            'SouscripteurEmail',
        );
        foreach ($fields as $field) {
            if ($souscripteur->{'get' . $field}()) {
                $key         = $field . ' = ?';
                $where[$key] = $souscripteur->{'get' . $field}();
            }
        }

        return $where;
    }

}

