<?php

class Application_Model_PackagesMapper extends Application_Model_BaseModelsMapper
{

    public function __construct()
    {
        parent::setDbTable('Application_Model_DbTable_Packages');
    }

    public function fetchAll($where = array())
    {
        $resultSet = $this->getDbTable()->fetchAll($where);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Packages();
            $entry
                    ->setPackageID($row->PackageID)
                    ->setPackageName($row->PackageName);

            $entries[] = $entry;
        }
        return $entries;
    }

    public function find($id)
    {
        return $this->getDbTable()->find($id)->current();
    }

    public function getDataFormById($id)
    {
        $array        = $this->find($id)->toArray();
        $array_values = array_values($array);
        $array_keys   = array_map('lcfirst', array_keys($array));

        // Garanties
        $packageGarantiesMapper = new Application_Model_PackagesGarantiesMapper();
        $array_keys[] = 'garanties';
        $array_values[] = $packageGarantiesMapper->findGarantiesIDsByPackageId($id);

        return array_combine($array_keys, $array_values);
    }

    public function getGarantiesByPackageId($id)
    {
        $garantiesLabels = array();
        $packageGarantiesMapper = new Application_Model_PackagesGarantiesMapper();
        $garantiesIDs = $packageGarantiesMapper->findGarantiesIDsByPackageId($id);

        $garantiesMapper = new Application_Model_GarantiesMapper();
        foreach ($garantiesIDs as $garantieID){
            $garantie = $garantiesMapper->find($garantieID);

            $garantiesLabels[$garantie->GarantieID] = $garantie->GarantieName;
        }
        return $garantiesLabels;
    }
    
    public function save(Application_Model_Packages $package)
    {
        $data = array(
            'PackageID'                    => $package->getPackageID(),
            'PackageName'                  => $package->getPackageName(),
            'PackagePrime'                 => $package->getPackagePrime(),
            'AssuranceID'                  => $package->getAssuranceID(),
            'AssureurID'                   => $package->getAssureurID(),
            'UsageID'                      => $package->getUsageID(),
            'PackageCible'                 => $package->getPackageCible(),
            'PackageSpecification'         => $package->getPackageSpecification(),
            'PackageConditionSouscription' => $package->getPackageConditionSouscription(),
            'PackageAvantage'              => $package->getPackageAvantage(),
            'PackageEnabled'               => $package->getPackageEnabled(),
        );

        if ('' === ($id = $package->getPackageID())) {
            $newID = $this->getDbTable()->insert($data);

            $package->setPackageID($newID);
        } else {
            $this->getDbTable()->update($data, array('PackageID = ?' => $package->getPackageID()));
        }

        // Delete current garanties
        $packageGarantieMapper = new Application_Model_PackagesGarantiesMapper();
        $packageGarantieMapper->deleteByPackageId($package->getPackageID());

        // Insert the new garanties
        foreach ($package->getGaranties() as $garantieID) {
            $packageGarantie = new Application_Model_PackagesGaranties();
            $packageGarantie->setGarantieID($garantieID);
            $packageGarantie->setPackageID($package->getPackageID());

            $packageGarantieMapper = new Application_Model_PackagesGarantiesMapper();
            $packageGarantieMapper->save($packageGarantie);
        }
    }

}