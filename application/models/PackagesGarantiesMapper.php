<?php

class Application_Model_PackagesGarantiesMapper extends Application_Model_BaseModelsMapper
{

    public function __construct()
    {
        parent::setDbTable('Application_Model_DbTable_PackagesGaranties');
    }

    public function findGarantiesIDsByPackageId($packageId)
    {
        $garantieIDs = array();
        $resultSet = $this->getDbTable()->fetchAll(array(
            'PackageID = ?' => $packageId,
                ));

        if ($resultSet)
            foreach ($resultSet as $packagesGrantie)
                $garantieIDs[] = $packagesGrantie->GarantieID;

        return $garantieIDs;
    }

    public function findMe(Application_Model_PackagesGaranties $packagesGaranties)
    {
        $resultSet = $this->getDbTable()->fetchRow(array(
            'PackageID = ?'  => $packagesGaranties->getPackageID(),
            'GarantieID = ?' => $packagesGaranties->getGarantieID()
                ));

        if ($resultSet) {
            $packagesGaranties = new Application_Model_PackagesGranties($resultSet->toArray());

            return true;
        } else {
            return null;
        }
    }

    public function save(Application_Model_PackagesGaranties $packagesGaranties)
    {
        $exists = $this->findMe($packagesGaranties);

        $data = array(
            'PackageID'      => $packagesGaranties->getPackageID(),
            'GarantieID'     => $packagesGaranties->getGarantieID(),
            'TauxMajoration' => $packagesGaranties->getTauxMajoration(),
            'TauxReduction'  => $packagesGaranties->getTauxReduction(),
        );

        if ($exists === null) {
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update(
                    $data, array(
                'PackageID = ?'  => $packagesGaranties->getPackageID(),
                'GarantieID = ?' => $packagesGaranties->getGarantieID()
                    )
            );
        }
    }

    public function deleteByPackageId($packageId)
    {
        $table = $this->getDbTable();

        $where = $table->getAdapter()->quoteInto('PackageID = ?', $packageId);

        $table->delete($where);
    }

}

