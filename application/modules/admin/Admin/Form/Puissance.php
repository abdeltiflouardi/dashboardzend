<?php

class Admin_Form_Puissance extends Application_Form_BaseForm
{

    public function init()
    {
        $carburantsMapper = new Application_Model_CarburantsMapper();

        $carburants = $carburantsMapper->fetchAllToArray();

        $this->addElement('hidden', 'puissanceID');
        $this->addElement('select', 'carburantID', array('multiOptions' => $carburants, 'validators' => array(), 'required' => true, 'label' => 'Carburants:'));
        $this->addElement('text', 'puissanceNbChevDe', array('validators' => array(), 'required' => true, 'label' => 'PuissanceNbChevDe:'));
        $this->addElement('text', 'puissanceNbChevA', array('validators' => array(), 'required' => true, 'label' => 'PuissanceNbChevA:'));
        $this->addElement('submit', 'save');

        parent::init();
    }

}