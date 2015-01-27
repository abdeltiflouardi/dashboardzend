<?php

class Admin_Form_Model extends Application_Form_BaseForm
{

    public function init()
    {
        $marqueMapper = new Application_Model_MarquesMapper();
        $marques = $marqueMapper->fetchAllToArray();
        
        $this->addElement('hidden', 'modeleID');
        $this->addElement('select', 'marqueID', array('multiOptions' => $marques,'validators' => array(), 'required' => true, 'label' => 'Marques:'));
        $this->addElement('text', 'modeleName', array('validators' => array(), 'required' => true, 'label' => 'Name:'));
        $this->addElement('submit', 'save');

        parent::init();
    }

}