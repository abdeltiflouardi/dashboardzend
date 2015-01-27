<?php

class Admin_Form_Garantie extends Application_Form_BaseForm
{

    public function init()
    {
        $this->addElement('hidden', 'garantieID');
        $this->addElement('text', 'garantieName', array('validators' => array(), 'required' => true, 'label' => 'Name:'));
        $this->addElement('textarea', 'garantieDescription', array('cols' => '40', 'rows' => '6', 'validators' => array(), 'label' => 'Description:'));
        $this->addElement('submit', 'save');

        parent::init();
    }

}