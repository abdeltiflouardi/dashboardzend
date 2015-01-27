<?php

class Manager_Form_FilterTarificationMoto extends Application_Form_BaseFilterForm
{

    public function init()
    {
        // Garanties
        $garanties        = array('' => 'Tous');
        $garantiesMapper  = new Application_Model_GarantiesMapper();
        $garanties        += $garantiesMapper->fetchAllToArray();

        // Cylindres
        $cylindresMapper = new Application_Model_CylindresMapper();
        $cylindres       = $cylindresMapper->fetchAllToArray();
        $cylindres['']   = 'Tous';

        $this->addElement('hidden', 'tarificationID');
        $this->addElement('select', 'garantieID', array('multiOptions' => $garanties, 'label'        => 'Garantie :'));
        $this->addElement('select', 'cylindreID', array('multiOptions' => $cylindres, 'label'        => 'Cylindre :'));
        $this->addElement('text', 'nbRoue', array('label' => 'Nombre de roue :'));
        $this->addElement('text', 'prime', array('label' => 'Prime :'));
        $this->addElement('submit', 'Rechercher');

        parent::init();
    }

}