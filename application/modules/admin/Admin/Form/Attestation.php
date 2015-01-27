<?php

class Admin_Form_Attestation extends Application_Form_BaseForm
{

    public function init()
    {
        $this->addElement('hidden', 'attestationID');
        $this->addElement('submit', 'save');

        parent::init();
    }
}