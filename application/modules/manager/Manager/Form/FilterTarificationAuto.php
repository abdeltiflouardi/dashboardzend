<?php

class Manager_Form_FilterTarificationAuto extends Application_Form_BaseFilterForm
{

    public function init()
    {
        // Usages
        $usages = array(''            => 'Tous');
        $usagesMapper = new Application_Model_UsagesMapper();
        $usages += $usagesMapper->fetchAllToArray();
        // Garanties
        $garanties    = array(''                => 'Tous');
        $garantiesMapper  = new Application_Model_GarantiesMapper();
        $garanties += $garantiesMapper->fetchAllToArray();
        // Carburants
        $carburantsMapper = new Application_Model_CarburantsMapper();
        $carburants       = $carburantsMapper->fetchAllToArray();
        $carburants['']   = 'Tous';

        // Puissances
        $puissancesMapper = new Application_Model_PuissancesMapper();
        $puissances       = $puissancesMapper->fetchAllToArray();
        $puissances['']   = 'Tous';

        $this->addElement('hidden', 'tarificationID');
        $this->addElement('select', 'usageID', array('multiOptions' => $usages, 'label'        => 'Usage :'));
        $this->addElement('select', 'garantieID', array('multiOptions' => $garanties, 'label'        => 'Garantie :'));
        $this->addElement('select', 'carburantID', array('multiOptions' => $carburants, 'label'        => 'Carburant :'));
        $this->addElement('select', 'puissanceID', array('multiOptions' => $puissances, 'label'        => 'Puissance :'));
        $this->addElement('text', 'prime', array('label' => 'Prime :'));
        $this->addElement('text', 'franchise', array('label' => 'Franchise :'));
        $this->addElement('text', 'valeurDeclaree', array('label' => 'Valeur déclarée :'));
        $this->addElement('submit', 'Rechercher');

        parent::init();
    }

}