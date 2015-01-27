<?php

class Admin_Form_Carburant extends Application_Form_BaseForm
{

    public function init()
    {
        $this->addElement('hidden', 'carburantID');
        $this->addElement('text', 'carburantName', array('validators' => array(), 'required' => true, 'label' => 'Name:'));
        $this->addElement('submit', 'save');

        parent::init();
    }

}