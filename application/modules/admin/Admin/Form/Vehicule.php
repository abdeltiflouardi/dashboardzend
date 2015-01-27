<?php

class Admin_Form_Vehicule extends Application_Form_BaseForm
{

    public function init()
    {
        $marquesMapper = new Application_Model_MarquesMapper();
        $modelesMapper = new Application_Model_ModelesMapper();
        $puissancesMapper = new Application_Model_PuissancesMapper();
        $carburantsMapper = new Application_Model_CarburantsMapper();

        $marques = $marquesMapper->fetchAllToArray();
        $modeles = $modelesMapper->fetchAllToArray();
        $puissances = $puissancesMapper->fetchAllToArray();
        $carburants = $carburantsMapper->fetchAllToArray();

        $this->addElement('hidden', 'vehiculeID');
        $this->addElement('select', 'marqueID', array('multiOptions' => $marques, 'validators' => array(), 'required' => true, 'label' => 'Marques:'));
        $this->addElement('select', 'modeleID', array('multiOptions' => $modeles, 'validators' => array(), 'required' => true, 'label' => 'Modèles:'));
        $this->addElement('select', 'puissanceID', array('multiOptions' => $puissances, 'validators' => array(), 'required' => true, 'label' => 'Puissances:'));
        $this->addElement('select', 'carburantID', array('multiOptions' => $carburants, 'validators' => array(), 'required' => true, 'label' => 'Carburants:'));
        $this->addElement('text', 'vehiculeImmatricule', array('validators' => array(), 'required' => true, 'label' => 'Immatricule:'));
        $this->addElement('text', 'vehiculeValeurNeuf', array('validators' => array(), 'required' => true, 'label' => 'Valeur neuf:'));
        $this->addElement('text', 'vehiculeValeurVenal', array('validators' => array(), 'required' => true, 'label' => 'Valeur venal:'));
        $this->addElement('text', 'vehiculeValeurGlaces', array('validators' => array(), 'required' => true, 'label' => 'Valeur glaces:'));
        $this->addElement('text', 'vehiculeDateAchat', array('validators' => array(), 'required' => true, 'label' => 'Date d\'achat:'));
        $this->addElement('text', 'dateMiseCirculation', array('validators' => array(), 'required' => true, 'label' => 'Date mise circulation:'));
        $this->addElement('text', 'vehiculeSurCredit', array('validators' => array(), 'required' => true, 'label' => 'Credit:'));
        $this->addElement('text', 'vehiculeMontantCredit', array('validators' => array(), 'required' => true, 'label' => 'Montant credit:'));
        $this->addElement('text', 'vehiculeDateFinCredit', array('validators' => array(), 'required' => true, 'label' => 'Date fin credit:'));
        $this->addElement('submit', 'save');

        parent::init();
    }

}