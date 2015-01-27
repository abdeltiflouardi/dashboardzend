<?php

class Admin_Form_Cylindre extends Application_Form_BaseForm
{

    public function init()
    {
        $this->addElement('hidden', 'cylindreID');
        $this->addElement('text', 'cylindreName', array('validators' => array(), 'required' => true, 'label' => 'Name:'));
        $this->addElement('submit', 'save');

        parent::init();
    }

}