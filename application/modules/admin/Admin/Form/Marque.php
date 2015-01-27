<?php

class Admin_Form_Marque extends Application_Form_BaseForm
{

    public function init()
    {
        $this->addElement('hidden', 'marqueID');
        $this->addElement('text', 'marqueName', array('validators' => array(), 'required' => true, 'label' => 'Name:'));
        $this->addElement('checkbox', 'active', array('label' => 'active'));
        $this->addElement('submit', 'save');

        parent::init();
    }

}

