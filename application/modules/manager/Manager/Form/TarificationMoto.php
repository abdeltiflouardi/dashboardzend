<?php

class Manager_Form_TarificationMoto extends Application_Form_BaseForm
{

    public function init()
    {
        // Garanties
        $garantiesMapper  = new Application_Model_GarantiesMapper();
        $garanties        = $garantiesMapper->fetchAllToArray();

        // Cylindres
        $cylindresMapper = new Application_Model_CylindresMapper();
        $cylindres       = $cylindresMapper->fetchAllToArray();

        $this->addElement('hidden', 'tarificationID');
        $this->addElement('select', 'garantieID', array('multiOptions' => $garanties, 'required' => true, 'label'        => 'Garantie :'));
        $this->addElement('select', 'cylindreID', array('multiOptions' => $cylindres, 'required' => true, 'label'        => 'Cylindre :'));
        $this->addElement('text', 'nbRoue', array('label' => 'Nombre de roue :', 'required' => true));
        $this->addElement('text', 'prime', array('label' => 'Prime :', 'required' => true));
        $this->addElement('submit', 'save');

        parent::init();
    }

}