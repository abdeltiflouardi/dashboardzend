<?php

class Admin_Form_Assureur extends Application_Form_BaseForm
{

    public function init()
    {
        $this->addElement('hidden', 'assureurID');
        $this->addElement('text', 'assureurName', array('validators' => array(), 'required' => true, 'label' => 'Name:'));
        $this->addElement('submit', 'save');

        parent::init();
    }
}