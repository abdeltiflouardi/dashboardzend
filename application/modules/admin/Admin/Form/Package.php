<?php

class Admin_Form_Package extends Application_Form_BaseForm
{

    private $assuranceID;

    public function __construct($assuranceID = null)
    {
        $this->assuranceID = $assuranceID;

        parent::__construct();
    }

    public function init()
    {
        $assureursMapper = new Application_Model_AssureursMapper();
        $usagesMapper = new Application_Model_UsagesMapper();
        $garantiesMapper = new Application_Model_GarantiesMapper();

        $assureurs = $assureursMapper->fetchAllToArray();
        $usages = $usagesMapper->fetchAllToArray();
        $garanties = $garantiesMapper->fetchAllToArray(array('AssuranceID = ?' => $this->assuranceID));

        $this->addElement('hidden', 'packageID');
        $this->addElement('select', 'assureurID', array('multiOptions' => $assureurs, 'validators' => array(), 'required' => true, 'label' => 'Assureur:'));
        $this->addElement('select', 'usageID', array('multiOptions' => $usages, 'validators' => array(), 'required' => true, 'label' => 'Usage:'));

        $this->addElement('text', 'packageName', array('validators' => array(), 'required' => true, 'label' => 'Name:'));
        $this->addElement('textarea', 'packageCible', array('attribs' => array('cols' => '40', 'rows' => '6'), 'validators' => array(), 'label' => 'Cible:'));
        $this->addElement('textarea', 'packageSpecification', array('attribs' => array('cols' => '40', 'rows' => '6'), 'validators' => array(), 'label' => 'Specification:'));
        $this->addElement('textarea', 'packageConditionSouscription', array('attribs' => array('cols' => '40', 'rows' => '6'), 'validators' => array(), 'label' => 'Condition de la sousscription:'));
        $this->addElement('textarea', 'packageAvantage', array('attribs' => array('cols' => '40', 'rows' => '6'), 'validators' => array(), 'label' => 'Avantage:'));

        // Attache garanties
        if (!empty($garanties)) {
            $this->addElement('multiCheckbox', 'garanties', array('label'        => 'Garanties', 'multiOptions' => $garanties));
        }
        
        $this->addElement('submit', 'save');

        parent::init();
    }

}