<?php

class Manager_Form_TarificationAuto extends Application_Form_BaseForm
{

    public function init()
    {
        // Usages
        $usagesMapper     = new Application_Model_UsagesMapper();
        $usages           = $usagesMapper->fetchAllToArray();
        // Garanties
        $garantiesMapper  = new Application_Model_GarantiesMapper();
        $garanties        = $garantiesMapper->fetchAllToArray();
        // Carburants
        $carburantsMapper = new Application_Model_CarburantsMapper();
        $carburants       = $carburantsMapper->fetchAllToArray();
        // Puissances
        $puissancesMapper = new Application_Model_PuissancesMapper();
        $puissances       = $puissancesMapper->fetchAllToArray();

        $this->addElement('hidden', 'tarificationID');
        $this->addElement('select', 'usageID', array('multiOptions' => $usages, 'required' => true,'label'        => 'Usage :'));
        $this->addElement('select', 'garantieID', array('multiOptions' => $garanties, 'required' => true, 'label'        => 'Garantie :'));
        $this->addElement('select', 'carburantID', array('multiOptions' => $carburants, 'required' => true, 'label'        => 'Carburant :'));
        $this->addElement('select', 'puissanceID', array('multiOptions' => $puissances, 'required' => true, 'label'        => 'Puissance :'));
        $this->addElement('text', 'prime', array('label' => 'Prime :', 'required' => true));
        $this->addElement('text', 'franchise', array('label' => 'Franchise :'));
        $this->addElement('text', 'valeurDeclaree', array('label' => 'Valeur déclarée :'));
        $this->addElement('submit', 'save');

        parent::init();
    }

}