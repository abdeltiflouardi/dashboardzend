<?php

class Manager_Form_Profile extends Application_Form_BaseForm
{

    public function init()
    {
        $this->addElement('text', 'assureurName', array('required' => true, 'label'    => 'Name:'));
        $this->addElement('text', 'assureurDescription', array('required' => true, 'label'    => 'Description:'));
        $this->addElement('file', 'assureurLogo', array('destination' => LOGO_TMP_PATH, 'label' => 'Logo:'));
        $this->addElement('text', 'assureurTelephone', array('required' => true, 'label' => 'Téléphone:'));
        $this->addElement('text', 'assureurFax', array('required' => true, 'label' => 'Fax:'));
        $this->addElement('text', 'assureurAdresse', array('required' => true, 'label' => 'Adresse:'));
        $this->addElement('text', 'assureurCodePostal', array('required' => true, 'label' => 'Code postal:'));
        $this->addElement('text', 'assureurVille', array('required' => true, 'label' => 'Ville:'));
        $this->addElement('text', 'assureurEmail', array('required' => true, 'label' => 'Email:'));

        $this->addElement('submit', 'save');

        parent::init();
    }

}