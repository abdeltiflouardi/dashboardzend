<?php

class Manager_Form_Garantie extends Application_Form_BaseForm
{

    private $assuranceID = '';

    public function __construct($assuranceID = null)
    {
        $this->assuranceID = $assuranceID;

        parent::__construct();
    }

    public function init()
    {
        // Garanties
        $garantiesMapper = new Application_Model_GarantiesMapper();
        $garanties       = $garantiesMapper->fetchAllToArray(array('AssuranceID = ?' => $this->assuranceID));

        // Attache garanties
        $this->addElement('select', 'garantieID', array('label'        => 'Garanties', 'multiOptions' => $garanties));
        $this->addElement('submit', 'save');

        parent::init();
    }

}
