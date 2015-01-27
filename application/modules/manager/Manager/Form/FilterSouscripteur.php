<?php

class Manager_Form_FilterSouscripteur extends Application_Form_BaseFilterForm
{

    public function __construct($options = null)
    {
        $options = array('method' => Zend_Form::METHOD_GET);

        parent::__construct($options);
    }

    public function init()
    {
        $this->addElement('text', 'SouscripteurID', array('label' => 'Numéro souscripteur:'));
        $this->addElement('text', 'SouscripteurCIN', array('label' => 'CIN:'));
        $this->addElement('text', 'SouscripteurNom', array('label' => 'Nom:'));
        $this->addElement('text', 'SouscripteurPrenom', array('label' => 'Prénom:'));
        $this->addElement('text', 'SouscripteurEmail', array('label' => 'Email:'));

        $this->addElement('submit', 'Rechercher');
    }

}