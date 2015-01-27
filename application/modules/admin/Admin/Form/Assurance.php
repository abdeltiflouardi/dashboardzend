<?php

class Admin_Form_Assurance extends Application_Form_BaseForm
{

    public function init()
    {
        $this->addElement('hidden', 'assuranceID');
        $this->addElement('text', 'assuranceName', array('validators' => array(), 'required' => true, 'label' => 'Name:'));
        $this->addElement('submit', 'save');

        parent::init();
    }
}