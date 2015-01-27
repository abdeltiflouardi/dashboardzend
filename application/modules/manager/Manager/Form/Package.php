<?php

class Manager_Form_Package extends Application_Form_BaseForm
{

    private $assuranceID = '';

    public function __construct($assuranceID = null)
    {
        $this->assuranceID = $assuranceID;

        parent::__construct();
    }

    public function init()
    {
        // Usages
        $usagesMapper = new Application_Model_UsagesMapper();
        $usages       = $usagesMapper->fetchAllToArray();

        // Choosed assurances garanties
        $auth = Zend_Auth::getInstance();
        $auth->setStorage(new Zend_Auth_Storage_Session('Zend_Auth', 'manager'));
        $assureur = $auth->getIdentity();

        $assureurId = $assureur->AssureurID;

        $garantiesAssureursMapper = new Application_Model_GarantiesAssureursMapper();
        $garantiesAssureurs = $garantiesAssureursMapper->fetchAllByAssureurAssurance($assureurId, $this->assuranceID);

        if (!empty($garantiesAssureurs)) {
            $where = array('AssuranceID = ?' => $this->assuranceID);

            $garantiesIds = array();
            foreach ($garantiesAssureurs as $garantiesAssureur) {
                $garantiesIds[] = $garantiesAssureur->getGarantieID();
            }
            $where[sprintf('GarantieID IN (' . implode(', ', array_fill(0, count($garantiesIds), '?')) . ')')] = $garantiesIds;

            // Garanties
            $garantiesMapper = new Application_Model_GarantiesMapper();
            $garanties       = $garantiesMapper->fetchAllToArray($where);
        } else {
            $garanties       = array();
        }

        $this->addElement('hidden', 'packageID');
        $this->addElement('select', 'usageID', array('multiOptions' => $usages, 'validators'   => array(), 'required' => true, 'label'    => 'Usage:'));

        $this->addElement('text', 'packageName', array('validators' => array(), 'required' => true, 'label'    => 'Name:'));
        $this->addElement('text', 'packagePrime', array('validators' => array(), 'required' => true, 'label'    => 'Prime:'));
        $this->addElement('textarea', 'packageCible', array('attribs' => array('cols' => '40', 'rows' => '6'), 'validators' => array(), 'label' => 'Cible:'));
        $this->addElement('textarea', 'packageSpecification', array('attribs' => array('cols' => '40', 'rows' => '6'), 'validators' => array(), 'label' => 'Specification:'));
        $this->addElement('textarea', 'packageConditionSouscription', array('attribs' => array('cols' => '40', 'rows' => '6'), 'validators' => array(), 'label' => 'Condition de la sousscription:'));
        $this->addElement('textarea', 'packageAvantage', array('attribs' => array('cols' => '40', 'rows' => '6'), 'validators' => array(), 'label' => 'Avantage:'));
        $this->addElement('checkbox', 'packageEnabled', array('validators' => array(), 'label' => 'Active:'));

        // Attache garanties
        if (!empty($garanties)) {
            $this->addElement('multiCheckbox', 'garanties', array('label'        => 'Garanties', 'multiOptions' => $garanties));
        }

        $this->addElement('submit', 'save');

        parent::init();
    }

}
