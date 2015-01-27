<?php

class Application_Model_TarificationsAutoMapper extends Application_Model_BaseModelsMapper
{

    public function __construct()
    {
        parent::setDbTable('Application_Model_DbTable_TarificationsAuto');
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_TarificationsAuto();
            $entry->setTarificationID($row->TarificationID)
                    ->setPrime($row->Prime);
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
        $array = $this->find($id)->toArray();
        $array_values = array_values($array);
        $array_keys = array_map('lcfirst', array_keys($array));

        return array_combine($array_keys, $array_values);
    }

    public function save(Application_Model_TarificationsAuto $tarification)
    {
        $data = array(
            'TarificationID' => $tarification->getTarificationID(),
            'GarantieID'     => $tarification->getGarantieID(),
            'UsageID'        => $tarification->getUsageID(),
            'CarburantID'    => $tarification->getCarburantID(),
            'PuissanceID'    => $tarification->getPuissanceID(),
            'Prime'          => $tarification->getPrime(),
            'Franchise'      => $tarification->getFranchise(),
            'ValeurDeclaree' => $tarification->getValeurDeclaree(),
        );

        if ('' === ($id = $tarification->getTarificationID())) {
            $newID = $this->getDbTable()->insert($data);

            $tarification->setTarificationID($newID);
        } else {
            $this->getDbTable()->update($data, array('TarificationID = ?' => $tarification->getTarificationID()));
        }
    }

}
