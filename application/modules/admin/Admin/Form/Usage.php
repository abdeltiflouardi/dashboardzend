<?php

class Admin_Form_Usage extends Application_Form_BaseForm
{

    public function init()
    {
        $this->addElement('hidden', 'usageID');
        $this->addElement('text', 'usageName', array('validators' => array(), 'required' => true, 'label' => 'Name:'));
        $this->addElement('submit', 'save');

        parent::init();
    }

}